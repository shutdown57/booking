<?php

namespace App\Http\Controllers;

use App\Enums\BookableStatus;
use App\Enums\BookableUserStatus;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\BookableUser;
use App\Services\BookableService;
use App\Services\BookingService;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Initializes the object with the given dependencies.
     *
     * @param BookingService $bookingService The booking service instance to use.
     * @param BookableService $bookableService The bookable service instance to use.
     */
    public function __construct(
        private BookingService $bookingService,
        private BookableService $bookableService
    ) {
    }

    /**
     * Display the index view of bookable users.
     *
     * @throws AuthorizationException If the user is not authorized
     *                                to get index booking page.
     */
    public function index(): \Inertia\Response
    {
        Gate::authorize('viewAny', \App\Models\BookableUser::class);
        return Inertia::render(
            'Booking/Index',
            [
                'books' => $this->bookingService->books(),
                'bookables' => $this->bookableService->bookables(
                    paginate: true,
                    status: BookableStatus::Active
                ),
            ]
        );
    }

    /**
     * Display the booking creation form with available bookable options.
     *
     * @throws AuthorizationException If the user is not authorized
     *                                to get create booking page.
     */
    public function create(Request $request): \Inertia\Response
    {
        Gate::authorize('create', \App\Models\BookableUser::class);
        $year = $request->query('year', now()->year);
        $month = $request->query('month', now()->month);
        return Inertia::render(
            'Booking/Create',
            [
                'booked' => $this->bookingService->bookedDates(
                    year: $year,
                    month: $month,
                ),
                'bookables' => $this->bookableService->bookables(
                    paginate: true,
                    status: BookableStatus::Active
                ),
            ]
        );
    }

    /**
     * Store a new booking.
     *
     * @param BookingStoreRequest $request The request containing the booking data.
     *
     * @throws AuthorizationException If the user is not authorized to create a booking.
     */
    public function store(BookingStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('create', \App\Models\BookableUser::class);
        $valid = $request->validated();
        $this->bookingService->store(
            bookableId: $valid['bookable'],
            bookIn: $valid['bookIn'],
            bookOut: $valid['bookOut'],
            status: BookableUserStatus::from($valid['status']),
        );
        return redirect(route('booking.index'));
    }

    /**
     * Edit a booking.
     *
     * @param Request $request Request object
     * @param BookableUser $bookableUser The bookable user to edit.
     *
     * @throws AuthorizationException If the user is not authorized to edit a booking.
     */
    public function edit(Request $request, int $id): \Inertia\Response
    {
        $bookableUser = $this->bookingService->book($id);
        Gate::authorize('edit', $bookableUser);
        $year = $request->query('year', now()->year);
        $month = $request->query('month', now()->month);
        return Inertia::render(
            'Booking/Edit',
            [
                'booked' => $this->bookingService->bookedDates(
                    year: $year,
                    month: $month,
                    bookId: $id,
                ),
                'book' => $bookableUser->load(['user', 'bookable.type']),
                'bookables' => $this->bookableService->bookables(
                    paginate: true,
                    status: BookableStatus::Active
                ),
            ]
        );
    }

    /**
     * Updates a booking.
     *
     * @param BookingUpdateRequest $request The updated booking details.
     * @param BookableUser $bookableUser The user associated with the bookable item.
     *
     * @throws AuthorizationException If the user is not authorized to update a booking.
     */
    public function update(
        BookingUpdateRequest $request,
        int $id,
    ): \Illuminate\Http\RedirectResponse {
        $bookableUser = $this->bookingService->book($id);
        Gate::authorize('edit', $bookableUser);
        $valid = $request->validated();
        $this->bookingService->update(
            bookableUserId: $id,
            bookableId: $valid['bookable'],
            bookIn: $valid['bookIn'],
            bookOut: $valid['bookOut'],
            status: BookableUserStatus::from($valid['status']),
        );
        return redirect(route('booking.index'));
    }

    /**
     * Destroys a bookable user's booking.
     *
     * @param int $id The bookable user id to destroy the booking for.
     *
     * @throws AuthorizationException If the user is not authorized to destroy a booking.
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $bookableUser = $this->bookingService->book($id);
        Gate::authorize('delete', $bookableUser);
        $this->bookingService->destroy($id);
        return redirect(route('booking.index'));
    }
}

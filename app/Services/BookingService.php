<?php

namespace App\Services;

use App\Enums\BookableUserStatus;
use App\Models\Bookable;
use App\Models\BookableUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookingService
{
    /**
     * Returns a paginated collection of users who have booked an appointment.
     *
     * If the current user has the role 'client', only their own bookings are shown,
     * otherwise all bookings are displayed in descending order by creation date.
     */
    public function books(): LengthAwarePaginator
    {
        $builder = BookableUser::query()
            ->with(['user', 'bookable.type']);
        if (in_array('client', Auth::user()->roles->toArray())) {
            return $builder
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'DESC')
                ->paginate();
        }
        return $builder
            ->orderBy('created_at', 'DESC')
            ->paginate();
    }

    /**
     * Get all booked dates by month and year.
     *
     * @param int $year The year to filter by.
     * @param int $month The month to filter by (1-12).
     * @param int|null $book BookableUser id
     */
    public function bookedDates(int $year, int $month, ?int $bookId = null): Collection
    {
        // TODO: Make dynamic format function per database connection
        // env('DB_CONNECTION') === 'sqlite';
        $builder = DB::table('bookable_user')
            ->whereYear('book_in', $year)
            ->whereMonth('book_in', $month);
        if ($bookId) {
            $builder->whereNot('bookable_user.id', $bookId);
        }
        return $builder->join('bookables', 'bookable_user.bookable_id', 'bookables.id')
            ->select([
                'bookable_user.bookable_id AS bookable_id',
                'bookable_user.book_in',
                'bookable_user.book_out',
            ])
            ->groupBy('bookable_user.book_in', 'bookable_user.bookable_id')
            ->get();
    }

    /**
     * Retrieves a specific booking by ID.
     *
     * @param int $id The ID of the booking to retrieve.
     */
    public function book(int $id): \App\Models\BookableUser|null
    {
        $builder = BookableUser::query()
            ->with(['user', 'bookable.type']);
        if (Auth::check() && in_array('client', Auth::user()?->roles->toArray())) {
            return $builder
                ->where('user_id', Auth::id())
                ->where('id', $id)
                ->first();
        }
        return $builder
            ->where('id', $id)
            ->first();
    }

    /**
     * Store a booking record for the specified bookable item.
     *
     * @param int $bookableId The ID of the bookable item to store the booking for.
     * @param string $bookIn The date and time when the booking starts.
     * @param string $bookOut The date and time when the booking ends.
     * @param null|BookableUserStatus  $status The current status of the user
     *                                         who made this booking. Defaults to NULL.
     */
    public function store(
        int $bookableId,
        string $bookIn,
        string $bookOut,
        ?BookableUserStatus $status,
    ): void {
        $bookable = Bookable::query()
            ->firstWhere('id', $bookableId);
        $bookable->users()->attach(Auth::id(), [
            'book_in' => $bookIn,
            'book_out' => $bookOut,
            'status' => $status->value,
        ]);
    }

    /**
     * Updates a bookable's user status.
     *
     * @param int $bookableUserId The ID of the user updating the bookable status.
     * @param int $bookableId The ID of the bookable being updated.
     * @param string $bookIn The date/time to mark as 'book in'.
     * @param string $bookOut The date/time to mark as 'book out'.
     * @param null|BookableUserStatus $status  The status of the booking,
     *                                         null for no change.
     */
    public function update(
        int $bookableUserId,
        int $bookableId,
        string $bookIn,
        string $bookOut,
        ?BookableUserStatus $status,
    ): void {
        BookableUser::query()
            ->where('id', $bookableUserId)
            ->update([
                'book_in' => $bookIn,
                'book_out' => $bookOut,
                'status' => $status->value,
                'bookable_id' => $bookableId,
            ]);
    }

    /**
     * Destroys a BookableUser instance.
     *
     * @param int $id The BookableUser id to destroy.
     */
    public function destroy(int $id): void
    {
        BookableUser::query()->where('id', $id)->delete();
    }
}

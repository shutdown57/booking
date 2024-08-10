<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookableStoreRequest;
use App\Http\Requests\BookableUpdateRequest;
use App\Services\BookableService;
use App\Services\BookableTypeService;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class BookableController extends Controller
{
    /**
    * Get paginated bookables index page
    *
    * @param BookableService $service BookableService object
    */
    public function index(BookableService $service): \Inertia\Response
    {
        Gate::authorize('viewAny', \App\Models\Bookable::class);
        return Inertia::render(
            'Bookable/Index',
            [
                'bookables' => fn () => $service->bookables(),
            ]
        );
    }

    /**
    * Get bookable create page
    *
    * @param BookableTypeService $service BookableTypeService object
    */
    public function create(BookableTypeService $service): \Inertia\Response
    {
        Gate::authorize('create', \App\Models\Bookable::class);
        return Inertia::render(
            'Bookable/Create',
            [
                'bookableTypes' => $service->bookableTypes(false),
            ]
        );
    }

    /**
    * Store bookable
    *
    * @param BookableStoreRequest $request Validation request object
    * @param BookableService $service BookableTypeService object
    */
    public function store(
        BookableStoreRequest $request,
        BookableService $service
    ): \Illuminate\Http\RedirectResponse {
        Gate::authorize('create', \App\Models\Bookable::class);
        $valid = $request->validated();
        $service->store(
            name: $valid['name'],
            bookableType: $valid['bookableType'],
            perHourRate: $valid['perHourRate'],
            image: $valid['image'],
            status: $valid['status'],
        );
        return redirect(route('bookable.index'));
    }

    /**
    * Get bookable show page
    *
    * @param int $id Bookable id
    * @param BookableService $service BookableService object
    */
    public function show(int $id, BookableService $service): \Inertia\Response
    {
        Gate::authorize('view', \App\Models\Bookable::class);
        return Inertia::render(
            'Bookable/Show',
            [
                'bookable' => $service->bookable($id),
            ]
        );
    }

    /**
    * Get bookable edit page
    *
    * @param int $id Bookable id
    * @param BookableService $service BookableService object
    * @param BookableTypeService $btService BookableTypeService object
    */
    public function edit(
        int $id,
        BookableService $service,
        BookableTypeService $btService,
    ): \Inertia\Response {
        Gate::authorize('edit', \App\Models\Bookable::class);
        return Inertia::render(
            'Bookable/Edit',
            [
                'bookable' => $service->bookable($id),
                'bookableTypes' => $btService->bookableTypes(false),
            ]
        );
    }

    /**
    * Update bookable
    *
    * @param BookableUpdateRequest $request Validation request object
    * @param int $id Bookable id
    * @param BookableService $service BookableService object
    */
    public function update(
        BookableUpdateRequest $request,
        int $id,
        BookableService $service
    ): \Illuminate\Http\RedirectResponse {
        Gate::authorize('edit', \App\Models\Bookable::class);
        $valid = $request->validated();
        $service->update(
            id: $id,
            name: $valid['name'],
            bookableType: $valid['bookableType'],
            perHourRate: $valid['perHourRate'],
            image: $valid['image'],
            status: $valid['status'],
        );
        return redirect(route('bookable.index'));
    }

    /**
    * Destroy bookable
    *
    * @param int $id Bookable id
    * @param BookableService $service BookableService object
    */
    public function destroy(
        int $id,
        BookableService $service
    ): \Illuminate\Http\RedirectResponse {
        Gate::authorize('delete', \App\Models\Bookable::class);
        $service->destroy($id);
        return redirect(route('bookable.index'));
    }
}

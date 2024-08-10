<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookableTypeStoreRequest;
use App\Http\Requests\BookableTypeUpdateRequest;
use App\Models\BookableType;
use App\Services\BookableTypeService;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class BookableTypeController extends Controller
{
    /**
    * Get bookable type list paginated
    *
    * @param BookableTypeService $service BookableTypeService object
    */
    public function index(BookableTypeService $service): \Inertia\Response
    {
        Gate::authorize('viewAny', \App\Models\BookableType::class);
        $items = $service->bookableTypes();

        return Inertia::render(
            'BookableType/Index',
            [
                'paginated' => $items,
            ]
        );
    }

    /**
    * Get create bookable types page
    */
    public function create(): \Inertia\Response
    {
        Gate::authorize('create', \App\Models\BookableType::class);
        return Inertia::render('BookableType/Create');
    }

    /**
    * Store a bookable type and redirect
    *
    * @param BookableTypeStoreRequest $request Validator request object
    * @param BookableTypeService $service BookableTypeService object
    */
    public function store(
        BookableTypeStoreRequest $request,
        BookableTypeService $service,
    ): \Illuminate\Http\RedirectResponse {
        Gate::authorize('create', \App\Models\BookableType::class);

        $valid = $request->validated();
        $service->store($valid['name']);
        return redirect()->route('bookable-type.index');
    }

    /**
    * Get a bookable type edit page
    */
    public function edit(BookableType $bookableType)
    {
        Gate::authorize('edit', \App\Models\BookableType::class);
        return Inertia::render(
            'BookableType/Edit',
            ['item' => $bookableType]
        );
    }

    /**
    * Update a bookable type and redirect
    *
    * @param BookableTypeStoreRequest $request Validator request object
    * @param int $id BookableType id
    * @param BookableTypeService $service BookableTypeService object
    */
    public function update(
        BookableTypeUpdateRequest $request,
        int $id,
        BookableTypeService $service
    ): \Illuminate\Http\RedirectResponse {
        Gate::authorize('edit', \App\Models\BookableType::class);
        $valid = $request->validated();
        $service->update($id, $valid['name']);
        return redirect()->route('bookable-type.index');
    }

    public function destroy(int $id, BookableTypeService $service)
    {
        Gate::authorize('delete', \App\Models\BookableType::class);
        $service->destroy($id);
        return redirect()->route('bookable-type.index');
    }
}

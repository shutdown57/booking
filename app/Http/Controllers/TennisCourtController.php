<?php

namespace App\Http\Controllers;

use App\Services\TennisCourtService;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class TennisCourtController extends Controller
{
    /**
    * Get tennis courts list paginated
    *
    * @param TennisCourtService $service TennisCourtService object
    */
    public function index(TennisCourtService $service): \Inertia\Response
    {
        Gate::authorize('viewAny', \App\Models\TennisCourt::class);
        $items = $service->tennisCourts();

        return Inertia::render(
            'TennisCourt/Index',
            [
                'items' => $items,
            ]
        );
    }

    /**
    * Get create tennis-court page
    */
    public function create(): \Inertia\Response
    {
        Gate::authorize('create', \App\Models\TennisCourt::class);
        return Inertia::render('TennisCourt/Create');
    }
}

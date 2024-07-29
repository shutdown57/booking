<?php

namespace App\Services;

use App\Models\TennisCourt;

class TennisCourtService
{
    /**
     * Get tennis courts ordered by name
     */
    public function tennisCourts(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return TennisCourt::query()->orderBy('name')->paginate();
    }
}

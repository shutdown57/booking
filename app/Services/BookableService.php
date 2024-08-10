<?php

namespace App\Services;

use App\Enums\BookableStatus;
use App\Models\Bookable;
use App\Models\BookableType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BookableService
{
    /**
    * Get bookables paginated
    *
    * @param bool $paginate With pagination (default true)
    * @param ?bool $status With all statuses (default true)
    */
    public function bookables(
        bool $paginate = true,
        ?BookableStatus $status = null
    ): Collection|LengthAwarePaginator {
        $builder = Bookable::query()
            ->with(['user', 'type']);
        if (is_null($status)) {
            $builder->whereIn('status', BookableStatus::cases());
        } elseif ($status === BookableStatus::Active) {
            $builder->where('status', BookableStatus::Active);
        } else {
            $builder->where('status', BookableStatus::Deactive);
        }

        if ($paginate) {
            return $builder->orderBy('created_at', 'DESC')->paginate();
        }
        return $builder->orderBy('created_at', 'DESC')->get();
    }

    /**
    * Get boolable by id
    *
    * @param int $id Bookable id
    */
    public function bookable(int $id): ?\App\Models\Bookable
    {
        return Bookable::query()
            ->with(['user', 'type'])
            ->firstWhere('id', $id);
    }

    /**
    * Store bookable
    *
    * @param int $perHourRate Bookable per-hour rate
    * @param string $name Bookable name
    * @param ?string $image Bookable image
    * @param ?int $status Bookable status
    */
    public function store(
        int $perHourRate,
        int $bookableType,
        string $name,
        ?string $image,
        ?int $status
    ): void {
        $bookable = Bookable::query()
            ->create([
                'name' => $name,
                'per_hour_rate' => $perHourRate,
                'image' => $image,
                'status' => $status ?? 0,
            ]);

        $bookable->type()->associate(BookableType::query()->find($bookableType));
        $bookable->user()->associate(Auth::user());
        $bookable->save();
    }

    /**
    * Update a bookable item
    *
    * @param int $id Bookable id
    * @param int $perHourRate Bookable per-hour rate
    * @param string $name Bookable name
    * @param ?string $image Bookable image
    * @param ?int $status Bookable status
    */
    public function update(
        int $id,
        int $perHourRate,
        int $bookableType,
        string $name,
        ?string $image,
        ?int $status
    ): void {
        $bookable = Bookable::query()->firstWhere('id', $id);
        $bookable
            ->update([
            'name' => $name,
            'per_hour_rate' => $perHourRate,
            'image' => $image,
            'status' => $status ?? 0,
            ]);
        $bookable->type()->dissociate();
        $bookable->type()->associate(BookableType::query()->find($bookableType));
        $bookable->user()->dissociate();
        $bookable->user()->associate(Auth::user());
        $bookable->save();
    }

    /**
    * Destroy a bookable
    *
    * @param int $id Bookable id
    */
    public function destroy(int $id): void
    {
        Bookable::query()->where('id', $id)->delete();
    }
}

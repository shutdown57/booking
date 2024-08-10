<?php

namespace App\Services;

use App\Models\BookableType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BookableTypeService
{
    /**
    * Get bookable types paginated or as collection
    *
    * @param bool $paginate BoolableTypes paginated or as collection
    */
    public function bookableTypes(bool $paginate = true): LengthAwarePaginator|Collection
    {
        $builder = BookableType::query()->orderBy('name');
        if ($paginate) {
            return $builder->paginate();
        }
        return $builder->get();
    }

    /**
    * Retrieves a bookable type by its ID.
    *
    * @param int $id The ID of the bookable type to retrieve.
    */
    public function bookableType(int $id): ?\App\Models\BookableType
    {
        return BookableType::query()->firstWhere('id', $id);
    }

    /**
    * Store bookable type
    *
    * @param string $name Bookable type name
    */
    public function store(string $name): void
    {
        BookableType::query()->create(['name' => $name]);
    }

    /**
    * Update bookable type
    *
    * @param int $id Bookable type id
    * @param string $name Bookable type name
    */
    public function update(int $id, string $name): void
    {
        BookableType::query()
            ->where('id', $id)
            ->update(['name' => $name]);
    }

    /**
    * Destroy a bookable type item
    *
    * @param int $id BookableType id
    */
    public function destroy(int $id): void
    {
        BookableType::query()
            ->where('id', $id)
            ->delete();
    }
}

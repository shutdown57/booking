<?php

use App\Models\BookableType;
use App\Services\BookableTypeService;
use Database\Seeders\DatabaseSeeder;

describe(
    'BookableType service',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            $this->service = new BookableTypeService();
        });

        test('bookableTypes method paginated', function () {
            $bookableTypes = $this->service->bookableTypes(true);

            expect($bookableTypes)
                ->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
        });

        test('bookableTypes method collection', function () {
            $bookableTypes = $this->service->bookableTypes(false);

            expect($bookableTypes)
                ->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
        });

        test('bookableType method get a bookable type', function () {
            $id = fake()->randomElement(
                BookableType::query()->get()->pluck('id')->toArray()
            );
            $bookableType = $this->service->bookableType($id);

            expect($bookableType->id)->toBe($id);
        });

        test('bookableType method get null', function () {
            $id = 123123;
            $bookableType = $this->service->bookableType($id);

            expect($bookableType)->toBeNull();
        });

        test('store method', function () {
            $name = fake()->streetName();
            $this->service->store($name);

            $bookableType = BookableType::query()->firstWhere('name', $name);
            expect($bookableType->name)->toBe($name);
        });

        test('update method', function () {
            $name = fake()->streetName();
            $this->service->store($name);

            $bookableType = BookableType::query()->firstWhere('name', $name);
            $name = fake()->streetName();
            $this->service->update($bookableType->id, $name);

            $bookableType->refresh();

            expect($bookableType->name)->toBe($name);
        });

        test('destroy method', function () {
            $name = fake()->streetName();
            $this->service->store($name);

            $bookableType = BookableType::query()->firstWhere('name', $name);
            $this->service->destroy($bookableType->id);

            $bookableType = BookableType::query()->firstWhere('name', $name);
            expect($bookableType)->toBeNull();
        });
    }
);

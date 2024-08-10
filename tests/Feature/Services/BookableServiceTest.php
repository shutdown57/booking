<?php

use App\Enums\BookableStatus;
use App\Models\Bookable;
use App\Models\BookableType;
use App\Services\BookableService;
use Database\Seeders\DatabaseSeeder;

describe(
    'Bookable service',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            $this->service = new BookableService();
        });

        test('bookables method paginated all statuses', function () {
            $bookables = $this->service->bookables(true);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
        });

        test('bookables method paginated active statuses', function () {
            $bookables = $this->service->bookables(true, BookableStatus::Active);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
        });

        test('bookables method paginated deactive statuses', function () {
            $bookables = $this->service->bookables(true, BookableStatus::Deactive);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Contracts\Pagination\LengthAwarePaginator::class);
        });

        test('bookables method collection all statuses', function () {
            $bookables = $this->service->bookables(false);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
        });

        test('bookables method collection active statuses', function () {
            $bookables = $this->service->bookables(false, BookableStatus::Active);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
        });

        test('bookables method collection deactive statuses', function () {
            $bookables = $this->service->bookables(false, BookableStatus::Deactive);
            expect($bookables)
                ->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
        });

        test('bookable method get a bookable', function () {
            $id = fake()->randomElement(
                Bookable::query()->get()->pluck('id')->toArray()
            );
            $bookable = $this->service->bookable($id);
            expect($bookable->id)->toBe($id);
        });

        test('bookable method get null', function () {
            $id = 123123;
            $bookable = $this->service->bookable($id);
            expect($bookable)->toBeNull();
        });

        test('store method', function () {
            $perHourRate = fake()->randomDigitNotNull();
            $bookableType = fake()->randomElement(
                BookableType::query()->get()->pluck('id')->toArray()
            );
            $name = fake()->name();
            $image = null;
            $status = fake()->randomElement(BookableStatus::cases());

            $this->service->store(
                perHourRate: $perHourRate,
                bookableType: $bookableType,
                name: $name,
                image: $image,
                status: $status->value
            );

            $bookable = Bookable::query()->firstWhere('name', $name);

            expect($bookable->per_hour_rate)->toBe($perHourRate);
            expect($bookable->bookable_type_id)->toBe($bookableType);
            expect($bookable->name)->toBe($name);
            expect($bookable->image)->toBe($image);
            expect($bookable->status)->toBe($status);
        });

        test('update method', function () {
            $perHourRate = fake()->randomDigitNotNull();
            $bookableType = fake()->randomElement(
                BookableType::query()->get()->pluck('id')->toArray()
            );
            $name = fake()->name();
            $image = null;
            $status = fake()->randomElement(BookableStatus::cases());

            $this->service->store(
                perHourRate: $perHourRate,
                bookableType: $bookableType,
                name: $name,
                image: $image,
                status: $status->value
            );

            $bookable = Bookable::query()->firstWhere('name', $name);

            $perHourRate = fake()->randomDigitNotNull();
            $bookableType = fake()->randomElement(
                BookableType::query()->get()->pluck('id')->toArray()
            );
            $name = fake()->name();
            $image = null;
            $status = fake()->randomElement(BookableStatus::cases());

            $this->service->update(
                id: $bookable->id,
                perHourRate: $perHourRate,
                bookableType: $bookableType,
                name: $name,
                image: $image,
                status: $status->value
            );
            $bookable->refresh();

            expect($bookable->per_hour_rate)->toBe($perHourRate);
            expect($bookable->bookable_type_id)->toBe($bookableType);
            expect($bookable->name)->toBe($name);
            expect($bookable->image)->toBe($image);
            expect($bookable->status)->toBe($status);
        });

        test('destroy method', function () {
            $perHourRate = fake()->randomDigitNotNull();
            $bookableType = fake()->randomElement(
                BookableType::query()->get()->pluck('id')->toArray()
            );
            $name = fake()->name();
            $image = null;
            $status = fake()->randomElement(BookableStatus::cases());

            $this->service->store(
                perHourRate: $perHourRate,
                bookableType: $bookableType,
                name: $name,
                image: $image,
                status: $status->value
            );

            $bookable = Bookable::query()->firstWhere('name', $name);
            $this->service->destroy($bookable->id);

            $bookable = BookableType::query()->firstWhere('name', $name);
            expect($bookable)->toBeNull();
        });
    }
);

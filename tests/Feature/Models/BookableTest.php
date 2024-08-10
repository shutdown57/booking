<?php

use App\Models\Bookable;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Schema;

describe(
    'Bookable model',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'has expected columns in database',
            function () {
                $hasColumn = Schema::hasColumns(
                    'bookables',
                    [
                        'id', 'name', 'per_hour_rate',
                        'image', 'status', 'user_id', 'bookable_type_id'
                    ]
                );
                expect($hasColumn)->toBeTruthy();
            }
        );

        test(
            'belongs to user (admin)',
            function () {
                $bookable = Bookable::factory()->create();
                expect($bookable->user)
                    ->toBeInstanceOf(App\Models\User::class);
            }
        );

        test(
            'belongs to many users (admin or client)',
            function () {
                $bookable = Bookable::factory()->create();
                expect($bookable->users)
                    ->toBeInstanceOf(Illuminate\Database\Eloquent\Collection::class);
            }
        );

        test(
            'belongs to bookable type',
            function () {
                $bookable = Bookable::factory()->create();
                expect($bookable->type)
                    ->toBeInstanceOf(App\Models\BookableType::class);
            }
        );
    }
);

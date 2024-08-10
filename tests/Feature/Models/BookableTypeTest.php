<?php

use App\Models\BookableType;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Schema;

describe(
    'BookableType model',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'has expected columns in database',
            function () {
                $hasColumn = Schema::hasColumns(
                    'bookable_types',
                    [
                        'id', 'name',
                    ]
                );
                expect($hasColumn)->toBeTruthy();
            }
        );

        test(
            'has many bookables',
            function () {
                $bookableType = BookableType::factory()->create();
                expect($bookableType->bookables)
                    ->toBeInstanceOf(Illuminate\Database\Eloquent\Collection::class);
            }
        );
    }
);

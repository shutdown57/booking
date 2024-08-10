<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Schema;

describe(
    'User model',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'has expected columns in database',
            function () {
                $hasColumn = Schema::hasColumns(
                    'users',
                    [
                        'id', 'name', 'email',
                        'email_verified_at', 'password',
                    ]
                );
                expect($hasColumn)->toBeTruthy();
            }
        );

        test(
            'belongs to many books (admin or client)',
            function (User $user) {
                expect($user->books)
                    ->toBeInstanceOf(Illuminate\Database\Eloquent\Collection::class);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'has many bookables (admin)',
            function () {
                $user = User::role('admin')->first();

                expect($user->bookables)
                    ->toBeInstanceOf(Illuminate\Database\Eloquent\Collection::class);
            }
        );
    }
);

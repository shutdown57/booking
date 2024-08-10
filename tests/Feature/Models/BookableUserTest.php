<?php

use App\Models\BookableUser;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Schema;

describe(
    'BookableUser model',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'has expected columns in database',
            function () {
                $hasColumn = Schema::hasColumns(
                    'bookable_user',
                    [
                        'id', 'book_in', 'book_out',
                        'status', 'user_id', 'bookable_id'
                    ]
                );
                expect($hasColumn)->toBeTruthy();
            }
        );

        test(
            'belongs to user (admin or client)',
            function (User $user) {
                $book = BookableUser::factory()->create([
                    'user_id' => $user->id
                ]);

                expect($book->user)
                    ->toBeInstanceOf(App\Models\User::class);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'belongs to bookable',
            function () {
                $book = BookableUser::factory()->create();

                expect($book->bookable)
                    ->toBeInstanceOf(App\Models\Bookable::class);
            }
        );
    }
);

<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Inertia\Testing\AssertableInertia as Assert;

describe(
    'Index controller index (home) page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered by anyone',
            function (?User $user) {
                if ($user) {
                    $response = $this->actingAs($user)->get('/');
                } else {
                    $response = $this->get('/');
                }

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page->component('Welcome')
                    )
                    ->assertStatus(200);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
                null
            ]
        );
    }
);

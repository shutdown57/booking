<?php

use App\Models\Bookable;
use App\Models\BookableType;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Inertia\Testing\AssertableInertia as Assert;

describe(
    'Bookable controller index page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered for admin',
            function () {
                $response = $this
                    ->actingAs(User::role('admin')->first())
                        ->get('/bookable');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('Bookable/Index')
                    )
                    ->assertStatus(200);
            }
        );

        test(
            'cannot be rendered for client and guest',
            function (?User $user) {
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                            ->get('/bookable');
                } else {
                    $response = $this->get('/bookable');
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );
    }
);

describe(
    'Bookable controller create page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered for admin',
            function () {
                $admin = User::role('admin')->first();
                $response = $this
                    ->actingAs($admin)
                    ->get('/bookable/create');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('Bookable/Create')
                    )
                    ->assertStatus(200);
            }
        );

        test(
            'cannot be rendered for client and guest',
            function (?User $user) {
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->get('/bookable/create');
                } else {
                    $response = $this->get('/bookable/create');
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );
    }
);

describe(
    'Bookable controller bookable',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be created by admin',
            function () {
                $admin = User::role('admin')->first();
                $response = $this
                    ->actingAs($admin)
                    ->post('/bookable', [
                        'name' => fake()->name(),
                        'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                        'perHourRate' => fake()->randomDigitNotNull(),
                        'image' => null,
                        'status' => fake()->randomElement([0, 1]),
                    ]);

                $result = Bookable::query()->latest()->first();
                $this->assertInstanceOf(Bookable::class, $result);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable');
            }
        );

        test(
            'cannot be created by client and guest',
            function (?User $user) {
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->post('/bookable', [
                            'name' => fake()->name(),
                            'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                            'perHourRate' => fake()->randomDigitNotNull(),
                            'image' => null,
                            'status' => fake()->randomElement([0, 1]),
                        ]);
                } else {
                    $response = $this
                        ->post('/bookable', [
                            'name' => fake()->name(),
                            'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                            'perHourRate' => fake()->randomDigitNotNull(),
                            'image' => null,
                            'status' => fake()->randomElement([0, 1]),
                        ]);
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );

        test(
            'can be edited by admin',
            function () {
                $admin = User::role('admin')->first();
                $bookable = Bookable::query()->first();
                $name = fake()->name();
                $response = $this
                    ->actingAs($admin)
                    ->put('/bookable/'.$bookable->id, [
                        'name' => $name,
                        'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                        'perHourRate' => fake()->randomDigitNotNull(),
                        'image' => null,
                        'status' => fake()->randomElement([0, 1]),
                    ]);

                $bookable->refresh();

                $this->assertEquals(
                    $name,
                    $bookable->name,
                );

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable');
            }
        );

        test(
            'cannot be edited by client and guest',
            function (?User $user) {
                $bookable = Bookable::query()->first();
                $name = fake()->name();
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->put('/bookable/'.$bookable->id, [
                            'name' => $name,
                            'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                            'perHourRate' => fake()->randomDigitNotNull(),
                            'image' => null,
                            'status' => fake()->randomElement([0, 1]),
                        ]);
                } else {
                    $response = $this
                        ->put('/bookable/'.$bookable->id, [
                            'name' => $name,
                            'bookableType' => fake()->randomElement(BookableType::all()->pluck('id')),
                            'perHourRate' => fake()->randomDigitNotNull(),
                            'image' => null,
                            'status' => fake()->randomElement([0, 1]),
                        ]);
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );

        test(
            'can be destroyed by admin',
            function () {
                $admin = User::role('admin')->first();
                $bookable = Bookable::query()->first();
                $id = $bookable->id;
                $response = $this
                    ->actingAs($admin)
                    ->delete('/bookable/'.$id);

                $result = Bookable::query()->find($id);
                $this->assertNull($result);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable');
            }
        );

        test(
            'cannot be destroyed by client and guest',
            function (?User $user) {
                $bookable = Bookable::query()->first();
                $id = $bookable->id;
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->delete('/bookable/'.$id);
                } else {
                    $response = $this->delete('/bookable/'.$id);
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );
    }
);

describe(
    'Bookable controller edit page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered for admin',
            function () {
                $admin = User::role('admin')->first();
                $bookable = Bookable::query()->first();
                $response = $this
                    ->actingAs($admin)
                    ->get('/bookable/'.$bookable->id.'/edit');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('Bookable/Edit')
                    )
                    ->assertStatus(200);
            }
        );

        test(
            'cannot be rendered for client and guest',
            function (?User $user) {
                $bookable = Bookable::query()->first();
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->get('/bookable/'.$bookable->id.'/edit');
                } else {
                    $response = $this
                        ->get('/bookable/'.$bookable->id.'/edit');
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                fn () => User::role('client')->first(),
                null,
            ]
        );
    }
);

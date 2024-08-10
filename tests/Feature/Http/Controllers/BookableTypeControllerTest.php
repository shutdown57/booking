<?php

use App\Models\BookableType;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Inertia\Testing\AssertableInertia as Assert;

describe(
    'BookableType controller index page',
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
                    ->get('/bookable-type');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('BookableType/Index')
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
                        ->get('/bookable-type');
                } else {
                    $response = $this->get('/bookable-type');
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
    'BookableType controller create page',
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
                    ->get('/bookable-type/create');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('BookableType/Create')
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
                        ->get('/bookable-type/create');
                } else {
                    $response = $this->get('/bookable-type/create');
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
    'BookableType controller bookable-type',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be created by admin',
            function () {
                $admin = User::role('admin')->first();
                $name = 'A bookable type test';
                $response = $this
                    ->actingAs($admin)
                    ->post('/bookable-type', [
                        'name' => $name,
                    ]);

                $result = BookableType::query()->firstWhere('name', $name);
                $this->assertInstanceOf(BookableType::class, $result);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable-type');
            }
        );

        test(
            'cannot be created by client and guest',
            function (?User $user) {
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->post('/bookable-type', [
                            'name' => 'A bookable type test',
                        ]);
                } else {
                    $response = $this->post('/bookable-type', [
                            'name' => 'A bookable type test',
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
                $bookableType = BookableType::query()->first();
                $name = 'New Bookable Type Name';
                $response = $this
                    ->actingAs($admin)
                    ->put('/bookable-type/'.$bookableType->id, [
                        'name' => $name
                    ]);

                $bookableType->refresh();

                $this->assertEquals(
                    $name,
                    $bookableType->name,
                );

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable-type');
            }
        );

        test(
            'cannot be edited by client and guest',
            function (?User $user) {
                $bookableType = BookableType::query()->first();
                $name = 'New Bookable Type Name';
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->put('/bookable-type/'.$bookableType->id, [
                            'name' => $name
                        ]);
                } else {
                    $response = $this
                        ->put('/bookable-type/'.$bookableType->id, [
                            'name' => $name
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
                $bookableType = BookableType::query()->first();
                $id = $bookableType->id;
                $response = $this
                    ->actingAs($admin)
                    ->delete('/bookable-type/'.$id);

                $result = BookableType::query()->find($id);
                $this->assertNull($result);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/bookable-type');
            }
        );

        test(
            'cannot be destroyed by client and guest',
            function (?User $user) {
                $bookableType = BookableType::query()->first();
                $id = $bookableType->id;
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->delete('/bookable-type/'.$id);
                } else {
                    $response = $this
                        ->delete('/bookable-type/'.$id);
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
    'BookableType controller edit page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered for admin',
            function () {
                $admin = User::role('admin')->first();
                $bookableType = BookableType::query()->first();
                $response = $this
                    ->actingAs($admin)
                    ->get('/bookable-type/'.$bookableType->id.'/edit');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('BookableType/Edit')
                    )
                    ->assertStatus(200);
            }
        );

        test(
            'cannot be rendered for client and guest',
            function (?User $user) {
                $bookableType = BookableType::query()->first();
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->get('/bookable-type/'.$bookableType->id.'/edit');
                } else {
                    $response = $this
                        ->get('/bookable-type/'.$bookableType->id.'/edit');
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

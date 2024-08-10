<?php

use App\Enums\BookableStatus;
use App\Models\Bookable;
use App\Models\BookableUser;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Carbon;
use Inertia\Testing\AssertableInertia as Assert;
use Spatie\Permission\Models\Role;

describe(
    'Booking controller index page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'can be rendered for admin and client',
            function (User $user) {
                $response = $this
                    ->actingAs($user)
                    ->get('/booking');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('Booking/Index')
                            ->has(
                                'bookables.data',
                                2,
                                fn (Assert $page) => $page
                                    ->where('id', 1)
                                    ->where('name', 'Number One')
                                    ->where('per_hour_rate', 12)
                                    ->where('status', BookableStatus::Active->value)
                                    ->where('type.id', 1)
                                    ->etc()
                            )
                            ->has('books.total')
                    )
                    ->assertStatus(200);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be rendered for guest',
            function () {
                $response = $this->get('/booking');

                $response->assertStatus(403);
            }
        );
    }
);

describe(
    'Booking controller create page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
            uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
        });

        test(
            'can be rendered for admin and client',
            function (User $user) {
                $response = $this
                    ->actingAs($user)
                    ->get('/booking/create');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page
                            ->component('Booking/Create')
                    )
                    ->assertStatus(200);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be rendered for guest',
            function () {
                $response = $this->get('/booking/create');

                $response->assertStatus(403);
            }
        );
    }
);

describe(
    'Booking controller booking',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be created by admin and client',
            function (User $user) {
                $response = $this
                    ->actingAs($user)
                    ->post('/booking', [
                        'bookable' => fake()->randomElement(
                            Bookable::query()->get()->pluck('id')->toArray()
                        ),
                        'bookIn' => now(),
                        'bookOut' => now()->addHour(1),
                        'status' => 0
                    ]);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/booking');
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be created by guest',
            function () {
                $response = $this
                    ->post('/booking', [
                        'bookable' => fake()->randomElement(
                            Bookable::query()->get()->pluck('id')->toArray()
                        ),
                        'bookIn' => now(),
                        'bookOut' => now()->addHour(1),
                        'status' => 0
                    ]);

                $response->assertStatus(403);
            }
        );

        test(
            'can be edited by admin and owner',
            function (User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()->randomElement(
                        Bookable::query()->get()->pluck('id')->toArray()
                    ),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => in_array(
                        'client',
                        $user->roles->toArray(),
                    ) ? $user->id : $client->id,
                ]);

                $year = now()->year;
                $month = now()->month;
                $day = now()->day;
                $today = $year.'-'.$month.'-'.$day;

                $bookIn = new Carbon($today.' 13:00:00');
                $bookOut = new Carbon($today.' 14:00:00');
                $bookable = fake()->randomElement(
                    Bookable::query()->get()->pluck('id')->toArray()
                );
                $response = $this->actingAs($client)
                    ->put('/booking/'.$booking->id, [
                        'bookable' => $bookable,
                        'bookIn' => $bookIn,
                        'bookOut' => $bookOut,
                        'status' => 0,
                    ]);

                $booking->refresh();

                expect($bookIn)->toEqual(new DateTime($booking->book_in));
                expect($bookOut)->toEqual(new DateTime($booking->book_out));
                expect($bookable)->toEqual($booking->bookable_id);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/booking');
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be edited by guest and non-owner',
            function (?User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()->randomElement(
                        Bookable::query()->get()->pluck('id')->toArray()
                    ),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => $client->id,
                ]);

                $year = now()->year;
                $month = now()->month;
                $day = now()->day;
                $today = $year.'-'.$month.'-'.$day;

                $bookIn = new Carbon($today.' 13:00:00');
                $bookOut = new Carbon($today.' 14:00:00');
                $bookable = fake()->randomElement(
                    Bookable::query()->get()->pluck('id')->toArray()
                );

                if ($user) {
                    $response = $this->actingAs($user)
                    ->put('/booking/'.$booking->id, [
                        'bookable' => $bookable,
                        'bookIn' => $bookIn,
                        'bookOut' => $bookOut,
                        'status' => 0,
                    ]);
                } else {
                    $response = $this->put('/booking/'.$booking->id, [
                        'bookable' => $bookable,
                        'bookIn' => $bookIn,
                        'bookOut' => $bookOut,
                        'status' => 0,
                    ]);
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                function () {
                    $user = User::factory()->create();
                    $role = Role::query()->firstWhere('name', 'client');
                    $user->assignRole([$role->id]);
                    return $user;
                },
                null,
            ]
        );

        test(
            'can be destroyed by admin and owner',
            function (User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()->randomElement(
                        Bookable::query()->get()->pluck('id')->toArray()
                    ),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => in_array(
                        'client',
                        $user->roles->toArray(),
                    ) ? $user->id : $client->id,
                ]);
                $id = $booking->id;
                $response = $this
                    ->actingAs($user)
                    ->delete('/booking/'.$id);

                $result = BookableUser::query()->find($id);
                $this->assertNull($result);

                $response
                    ->assertSessionHasNoErrors()
                    ->assertRedirect('/booking');
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be destroyed by guest and non-owner',
            function (?User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()->randomElement(
                        Bookable::query()->get()->pluck('id')->toArray()
                    ),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => $client->id,
                ]);
                $id = $booking->id;
                if ($user) {
                    $response = $this
                        ->actingAs($user)
                        ->delete('/booking/'.$id);
                } else {
                    $response = $this->delete('/booking/'.$id);
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                function () {
                    $user = User::factory()->create();
                    $role = Role::query()->firstWhere('name', 'client');
                    $user->assignRole([$role->id]);
                    return $user;
                },
                null,
            ]
        );
    }
);

describe(
    'Booking controller edit page',
    function () {
        beforeEach(function () {
            $this->seed(DatabaseSeeder::class);
        });

        test(
            'can be rendered for admin and owner',
            function (User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()
                        ->randomElement(Bookable::query()->get()->pluck('id')->toArray()),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => in_array(
                        'client',
                        $user->roles->toArray(),
                    ) ? $user->id : $client->id,
                ]);
                $response = $this->actingAs($user)
                    ->get('/booking/'.$booking->id.'/edit');

                $response
                    ->assertInertia(
                        fn (Assert $page) => $page->component('Booking/Edit')
                    )
                    ->assertStatus(200);
            }
        )->with(
            [
                fn () => User::role('admin')->first(),
                fn () => User::role('client')->first(),
            ]
        );

        test(
            'cannot be rendered for guest or non-owner',
            function (?User $user) {
                $client = User::role('client')->first();
                $booking = BookableUser::query()->create([
                    'bookable_id' => fake()
                        ->randomElement(Bookable::query()->get()->pluck('id')->toArray()),
                    'book_in' => now(),
                    'book_out' => now()->addHour(1),
                    'status' => 0,
                    'user_id' => $client->id,
                ]);
                if ($user) {
                    $response = $this->actingAs($user)
                        ->get('/booking/'.$booking->id.'/edit');
                } else {
                    $response = $this->get('/booking/'.$booking->id.'/edit');
                }

                $response->assertStatus(403);
            }
        )->with(
            [
                function () {
                    $user = User::factory()->create();
                    $role = Role::query()->firstWhere('name', 'client');
                    $user->assignRole([$role->id]);
                    return $user;
                },
                null,
            ]
        );
    }
);

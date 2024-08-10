<?php

namespace Database\Factories;

use App\Enums\BookableUserStatus;
use App\Models\Bookable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookableUser>
 */
class BookableUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_in' => now(),
            'book_out' => now()->addHours(1),
            'status' => BookableUserStatus::Pending,
            'user_id' => fake()->randomElement(
                User::all()->pluck('id')
            ),
            'bookable_id' => fake()->randomElement(
                Bookable::all()->pluck('id')
            ),
        ];
    }
}

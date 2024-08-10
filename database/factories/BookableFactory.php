<?php

namespace Database\Factories;

use App\Enums\BookableStatus;
use App\Models\BookableType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookable>
 */
class BookableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'per_hour_rate' => fake()->numberBetween(5, 100),
            'image' => fake()->image,
            'name' => Str::random(12),
            'status' => fake()->randomElement(BookableStatus::cases()),
            'user_id' => (User::role('admin')->first())->id,
            'bookable_type_id' => fake()->randomElement(
                BookableType::all()->pluck('id')
            ),
        ];
    }
}

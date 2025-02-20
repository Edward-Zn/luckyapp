<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'phone' => $this->faker->phoneNumber(),
            'unique_link' => '/link/' . Str::random(16), // Generates a unique link using UUID
            'link_expires_at' => Carbon::now()->addDays(7), // Sets expiration 7 days from now
        ];
    }
}

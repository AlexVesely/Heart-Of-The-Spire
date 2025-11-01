<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * Class PostFactory
 * 
 * Generates fake realistic data for the Profile model.
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Create a User to link to this Profile
            'user_id' => User::factory(),
            'profile_name' => fake()->userName(),
            'is_admin' => fake()->boolean(),
            'bio' => fake()->realText(300),
            'fav_class' => fake()->randomElement(['ironclad','silent','defect','watcher']),
        ];
    }
}

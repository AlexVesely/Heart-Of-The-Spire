<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

/**
 * Class PostFactory
 * 
 * Generates fake realistic data for the Post model.
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Find a random created profile to own this post
            'profile_id' => fake()->numberBetween(1, Profile::count()),
            
            'title'=>fake()->sentence(),
            'content' => fake()->realText(500),
        ];
    }
}

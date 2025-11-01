<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;
use App\Models\Post;

/**
 * Class CommentFactory
 * 
 * Generates fake realistic data for the Comment model.
 * 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Find a random created user to own this comment
            'profile_id' => fake()->numberBetween(1, Profile::count()),

            // Find a random created post for this comment to be on
            'post_id' => fake()->numberBetween(1, Post::count()),
            'content' => fake()->realText(500),
        ];
    }
}

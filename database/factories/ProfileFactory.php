<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
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
            'name' => fake()->name(),
            'is_admin' => fake()->boolean(),
            'bio' => fake()->realText(500),
            'fav_class' => fake()->randomElement(['ironclad','silent','defect','watcher','neutral']),
        ];
    }
}

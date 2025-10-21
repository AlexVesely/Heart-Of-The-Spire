<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
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
            'energy_cost' => fake()->numberBetween(0, 3),
            'rarity' => fake()->name(),
            'type'  => fake()->name(),
            'class'  => fake()->name(),
        ];
    }
}





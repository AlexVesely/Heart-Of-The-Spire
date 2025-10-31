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
            'name' => fake()->word,
            'energy_cost' => fake()->numberBetween(0, 3),
            'rarity' => fake()->randomElement(['starter', 'common', 'uncommon', 'rare']),
            'type'  => fake()->randomElement(['attack','skill','power']),
            'class'  => fake()->randomElement(['ironclad','silent','defect','watcher']),
        ];
    }
}

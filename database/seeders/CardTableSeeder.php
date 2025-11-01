<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Card;
        $a->name = "anger";
        $a->energy_cost = 0;
        $a->rarity = 'common';
        $a->type = 'attack';
        $a->class = 'ironclad';
        $a->save();

        $b = new Card;
        $b->name = "footwork";
        $b->energy_cost = 0;
        $b->rarity = 'uncommon';
        $b->type = 'power';
        $b->class = 'silent';
        $b->save();

        Card::factory()->count(10)->create();
    }
}

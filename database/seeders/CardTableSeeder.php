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
        $a->name = "Anger";
        $a->energy_cost = 0;
        $a->rarity = 'Common';
        $a->type = 'Attack';
        $a->class = 'Ironclad';
        $a->save();

        $b = new Card;
        $b->name = "Backstab";
        $b->energy_cost = 0;
        $b->rarity = 'Uncommon';
        $b->type = 'Attack';
        $b->class = 'Silent';
        $b->save();

        Card::factory()->count(20)->create();
    }
}

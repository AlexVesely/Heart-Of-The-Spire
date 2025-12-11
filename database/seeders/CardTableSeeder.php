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
        $card1 = new Card;
        $card1->name = "anger";
        $card1->energy_cost = 0;
        $card1->rarity = 'common';
        $card1->type = 'attack';
        $card1->class = 'ironclad';
        $card1->card_text = 'Deal 6 damage. Add a copy of this card into your discard pile.';
        $card1->save();

        $card2 = new Card;
        $card2->name = "footwork";
        $card2->energy_cost = 1;
        $card2->rarity = 'uncommon';
        $card2->type = 'power';
        $card2->class = 'silent';
        $card2->card_text = 'Gain 2 Dexterity.';
        $card2->save();

        // Create 10 cards for 'cards' table
        Card::factory()->count(50)->create();
    }
}

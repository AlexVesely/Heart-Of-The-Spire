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
        $card1->name = "Alchemize";
        $card1->energy_cost = 1;
        $card1->rarity = 'rare';
        $card1->type = 'skill';
        $card1->class = 'silent';
        $card1->card_text = 'Obtain a random potion. Exhaust.';
        $card1->save();

        $card2 = new Card;
        $card2->name = "Anger";
        $card2->energy_cost = 0;
        $card2->rarity = 'common';
        $card2->type = 'attack';
        $card2->class = 'ironclad';
        $card2->card_text = 'Deal 6 damage. Add a copy of this card into your discard pile.';
        $card2->save();

        $card3 = new Card;
        $card3->name = "Ball Lightning";
        $card3->energy_cost = 1;
        $card3->rarity = 'common';
        $card3->type = 'attack';
        $card3->class = 'defect';
        $card3->card_text = 'Deal 7 damage. Channel 1 Lightning';
        $card3->save();

        $card4 = new Card;
        $card4->name = "Bash";
        $card4->energy_cost = 2;
        $card4->rarity = 'starter';
        $card4->type = 'attack';
        $card4->class = 'ironclad';
        $card4->card_text = 'Deal 8 damage. Apply 2 Vulnerable.';
        $card4->save();

        $card5 = new Card;
        $card5->name = "Defragment";
        $card5->energy_cost = 1;
        $card5->rarity = 'uncommon';
        $card5->type = 'power';
        $card5->class = 'defect';
        $card5->card_text = 'Gain 1 Focus.';
        $card5->save();

        $card6 = new Card;
        $card6->name = "Empty Body";
        $card6->energy_cost = 1;
        $card6->rarity = 'starter';
        $card6->type = 'skill';
        $card6->class = 'watcher';
        $card6->card_text = 'Gain 7 Block. Exit your Stance.';
        $card6->save();

        $card7 = new Card;
        $card7->name = "Footwork";
        $card7->energy_cost = 1;
        $card7->rarity = 'uncommon';
        $card7->type = 'power';
        $card7->class = 'silent';
        $card7->card_text = 'Gain 2 Dexterity.';
        $card7->save();

        $card8 = new Card;
        $card8->name = "Wallop";
        $card8->energy_cost = 2;
        $card8->rarity = 'uncommon';
        $card8->type = 'power';
        $card8->class = 'silent';
        $card8->card_text = 'Gain 2 Dexterity.';
        $card8->save();
    }
}

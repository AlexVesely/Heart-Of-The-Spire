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
        // $a = new Card;
        // $a->name = "Anger";
        // $a->energy_cost = 0;
        // $a->rarity = "Common";
        // $a->type = "Attack";
        // $a->class = "Ironclad";
        // $a->save();

        // $b = new Card;
        // $b->name = "Backstab";
        // $b->energy_cost = 0;
        // $b->rarity = "Uncommon";
        // $b->type = "Attack";
        // $b->class = "Silent";
        // $b->save();

        // $c = new Card;
        // $c->name = "Defragment";
        // $c->energy_cost = 1;
        // $c->rarity = "Uncommon";
        // $c->type = "Power";
        // $c->class = "Defect";
        // $c->save();

        // $d = new Card;
        // $d->name = "Meditate";
        // $d->energy_cost = 1;
        // $d->rarity = "Uncommon";
        // $d->type = "Skill";
        // $d->class = "Watcher";
        // $d->save();

        // $e = new Card;
        // $e->name = "Hand of Greed";
        // $e->energy_cost = 2;
        // $e->rarity = "Rare";
        // $e->type = "Attack";
        // $e->class = "Colourless";
        // $e->save();

        Card::factory()->count(20)->create();
    }
}

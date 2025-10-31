<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Post;
        $a->title = "This card sucks";
        $a->content = "I have played this game for 200 hours, maybe and never could make this card work.";
        $a->profile_id = 1;
        $a->save();
        $a->cards()->attach(1);
        $a->cards()->attach(2);

        $b = new Post;
        $b->title = "Bash is broken";
        $b->content = "I think it should be nerfed, just an opinion don't shoot the messenger.";
        $b->profile_id = 1;
        $b->save();

        $c = new Post;
        $c->title = "Any ideas on how to make this card work?";
        $c->content = "I am not a bad player, this card just is not synergysing with anything.";
        $c->profile_id = 2;
        $c->save();

        Post::factory()->count(10)->create();
    }
}

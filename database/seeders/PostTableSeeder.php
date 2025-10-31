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
        $a->title = "This game is alright";
        $a->content = "I have played this game for 200 hours, maybe.";
        $a->profile_id = 1;
        $a->save();

        $b = new Post;
        $b->title = "Ironclad is broken";
        $b->content = "I think it should be nerfed, just an opinion don't shoot the messenger.";
        $b->profile_id = 1;
        $b->save();

        $c = new Post;
        $c->title = "Ironclad is too weak";
        $c->content = "I am not a bad player, this class just is not good.";
        $c->profile_id = 2;
        $c->save();


    }
}

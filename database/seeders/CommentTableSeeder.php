<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Comment;
        $a->content = "Great post! I love those cards too!";
        $a->profile_id = 3;
        $a->post_id = 1;
        $a->save();

        $b = new Comment;
        $b->content = "Footwork is great in combination with block cards.";
        $b->profile_id = 1;
        $b->post_id = 3;
        $b->save();

        Comment::factory()->count(10)->create();
    }
}

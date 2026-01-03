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
        $a->profile_id = 3; // Connect profile3 to comment1
        $a->post_id = 1; // Connect post1 to comment1
        $a->save();

        $b = new Comment;
        $b->content = "Footwork is great in combination with block cards.";
        $b->profile_id = 1; // Connect profile1 to comment1
        $b->post_id = 3; // Connect post3 to comment2
        $b->save();

        // Create 10 comments for 'comments' table
        Comment::factory()->count(50)->create();
    }
}

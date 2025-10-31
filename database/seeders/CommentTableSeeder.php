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
        $a->content = "Great post! I agree with you!";
        $a->profile_id = 3;
        $a->post_id = 1;
        $a->save();

        $b = new Comment;
        $b->content = "I disagree with you and don't think Bash is a very good card";
        $b->profile_id = 2;
        $b->post_id = 2;
        $b->save();

        Comment::factory()->count(10)->create();
    }
}

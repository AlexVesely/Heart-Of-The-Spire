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
        $post1 = new Post;
        $post1->title = "These are my favourite cards";
        $post1->content = "I love anger and footwork. There's just something great about them.";
        $post1->profile_id = 1; // Connect profile1 to post1
        $post1->save();
        $post1->cards()->attach(1); // attach card1 to post1
        $post1->cards()->attach(2); // attach card1 to post1

        $post2 = new Post;
        $post2->title = "Ironclad is broken";
        $post2->content = "I think it should be nerfed, just an opinion.";
        $post2->profile_id = 2; // Connect profile2 to post2
        $post2->save();

        $post3 = new Post;
        $post3->title = "Any ideas on how to make this card work?";
        $post3->content = "I am not a bad player, this card just is not working with anything.";
        $post3->profile_id = 2; // Connect profile2 to post3
        $post3->save();
        $post3->cards()->attach(2); // attach card1 to post3

        // Create 10 posts for 'posts' table
        Post::factory()->count(10)->create();
    }
}

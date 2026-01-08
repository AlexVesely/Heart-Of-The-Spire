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
        $post1->cards()->attach(2); // attach card2 to post1
        $post1->cards()->attach(7); // attach card7 to post1

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
        $post3->cards()->attach(4); // attach card4 to post3

        $post4 = new Post;
        $post4->title = "Alchemize is AMAZING";
        $post4->content = "Try it in all your silent decks. You will always win";
        $post4->profile_id = 3; // Connect profile3 to post4
        $post4->save();
        $post4->cards()->attach(1); // attach card1 to post4

        $post5 = new Post;
        $post5->title = "Which card should i choose between these two?";
        $post5->content = "This is a critical time to choose a card!!!";
        $post5->profile_id = 4; // Connect profile4 to post5
        $post5->save();
        $post5->cards()->attach(3); // attach card3 to post5
        $post5->cards()->attach(5); // attach card5 to post5

        $post6 = new Post;
        $post6->title = "I like Empty Body";
        $post6->content = "It has saved me on so many occasions";
        $post6->profile_id = 3; // Connect profile3 to post6
        $post6->save();
        $post6->cards()->attach(6); // attach card6 to post6
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Card;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CardTableSeeder::class);
        // Whenever Users are created a profile is created alongside
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);

        // Use factories to create 10 new posts and attach 0-3 existing cards to each post
        Post::factory()
            ->count(30)
            ->create()
            ->each(function ($post) {
                $count = rand(0, 3);

                if ($count > 0) {
                    $post->cards()->attach(
                        Card::inRandomOrder()->limit($count)->pluck('id')
                    );
                }
            });

        $this->call(CommentTableSeeder::class);
    }
}

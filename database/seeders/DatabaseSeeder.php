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
        // Seed core seeders first
        $this->call(CardTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(CommentTableSeeder::class);

        // Use factories to create 10 new posts and attach 2 new cards to each post
        Post::factory()->count(10)->hasAttached(Card::factory()->count(2))->create();
    }
}

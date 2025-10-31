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
        $this->call(UserTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
        Post::factory()->count(10)->hasAttached(Card::factory()->count(2))->create();
        $this->call(CommentTableSeeder::class);
    }
}

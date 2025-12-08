<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
    {
        $user1 = new User;
        $user1->name = "Archelaos Dev";
        $user1->email = "AD@example.com";
        $user1->password = "1234";
        $user1->save();

        // User1 is hardcoding into being an admin
        $user1->profile()->update([
            'profile_name' => 'AdminProfile',
            'is_admin' => true,
            'bio' => 'I am the admin.',
            'fav_class' => 'ironclad', // default
        ]);

        $user2 = new User;
        $user2->name = "Iris Arlet";
        $user2->email = "IA@example.com";
        $user2->password = "4567";
        $user2->save();

        $user3 = new User;
        $user3->name = "Erin Columbine";
        $user3->email = "EC@example.com";
        $user3->password = "Secret!78";
        $user3->save();

        User::factory()->count(10)->create();
    }
}

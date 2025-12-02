<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Commented out to fix problems of nonequal profiles and users

        // $profile1 = new Profile;
        // $profile1->profile_name = "AD0211";
        // $profile1->is_admin = True;
        // $profile1->bio = "Hiya, its me!";
        // $profile1->fav_class = 'ironclad';
        // $profile1->user_id = 1; // Connect profile1 with user1
        // $profile1->save();

        // $profile2 = new Profile;
        // $profile2->profile_name = "Slayer456";
        // $profile2->is_admin = False;
        // $profile2->bio = "I am Leo, I love STS";
        // $profile2->fav_class = 'silent';
        // $profile2->user_id = 2; // Connect profile2 with user2
        // $profile2->save();

        // $profile3 = new Profile;
        // $profile3->profile_name = "DefectLover22";
        // $profile3->is_admin = False;
        // $profile3->bio = "Defect is my favourite class";
        // $profile3->fav_class = 'defect';
        // $profile3->user_id = 3; // Connect profile3 with user3
        // $profile3->save();

        // // Create 10 profiles for 'profiles' table
        // Profile::factory()->count(10)->create();
    }
}

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
        $a = new Profile;
        $a->is_admin = True;
        $a->bio = "Yoooo its me";
        $a->fav_class = 'ironclad';
        $a->user_id = 1;
        $a->save();

        $b = new Profile;
        $b->is_admin = False;
        $b->bio = "I am Leo, I love STS";
        $b->fav_class = 'silent';
        $b->user_id = 2;
        $b->save();

        $c = new Profile;
        $c->is_admin = False;
        $c->bio = "I only play Defect";
        $c->fav_class = 'defect';
        $c->user_id = 3;
        $c->save();
    }
}

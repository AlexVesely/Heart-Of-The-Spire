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
        $a = new User;
        $a->name = "Alex Vesely";
        $a->email = "AV@example.com";
        $a->password = "1234";
        $a->save();

        $b = new User;
        $b->name = "Leo Vesely";
        $b->email = "LV@example.com";
        $b->password = "4567";
        $b->save();

        $c = new User;
        $c->name = "Tomas Vesely";
        $c->email = "TV@example.com";
        $c->password = "Secret!78";
        $c->save();
    }
}

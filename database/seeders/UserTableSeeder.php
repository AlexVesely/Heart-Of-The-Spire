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
        $a->name = "Archelaos Dev";
        $a->email = "AD@example.com";
        $a->password = "1234";
        $a->save();

        $b = new User;
        $b->name = "Iris Arlet";
        $b->email = "IA@example.com";
        $b->password = "4567";
        $b->save();

        $c = new User;
        $c->name = "Erin Columbine";
        $c->email = "EC@example.com";
        $c->password = "Secret!78";
        $c->save();
    }
}

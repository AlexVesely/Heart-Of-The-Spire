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
        $a->password = "12345";
        $a->save();

        $b = new User;
        $b->name = "Leo Vesely";
        $b->email = "LV@example.com";
        $b->password = "5678";
        $b->save();
    }
}

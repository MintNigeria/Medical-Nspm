<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "Solomon Onwude",
            "email" => "solomon.onwude@mintnigeria.com",
            "password" => Hash::make("password"),
            "staff_id" => "6206",
            "role" => "medic-admin",
            "locality" => "abj",
        ]);

        User::create([
            "name" => "Magdalene Eyo",
            "email" => "magdalene.asuquo@mintnigeria.com",
            "password" => Hash::make("password"),
            "staff_id" => "OB/5600",
            "role" => "him",
            "locality" => "abj",
        ]);

        User::create([
            "name" => "Abutu E. Edwin",
            "email" => "edwin.abutu@mintnigeria.com",
            "password" => Hash::make("password"),
            "staff_id" => "OB/5479",
            "role" => "him",
            "locality" => "abj"
        ]);
    
    }
}

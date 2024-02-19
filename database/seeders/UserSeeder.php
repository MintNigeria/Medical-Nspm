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
            "name"=> "John Doe",
            "email" => "medicadmin@gmail.com",
            "password" => Hash::make("password"),
            "staff_id" => "9000",
            "role" => "medicadmin",
            "locality" => "lagos",
        ]);
        User::create([
            "name"=> "Doctor Lag",
            "email" => "lagosdoctor@gmail.com",
            "password" => Hash::make("password"),
            "staff_id" => "2000",
            "role" => "doctor",
            "locality" => "lagos",

        ]);
        User::create([
            "name"=> "Nurse Lag",
            "email" => "nurselag@gmail.com",
            "password" => Hash::make("password"),
            "staff_id" => "3000",
            "role" => "nurse",
            "locality" => "lagos",
        ]);
        User::create([
            "name"=> "Pharmacy Lag",
            "email" => "pharmacylag@gmail.com",
            "password" => Hash::make("password"),
            "staff_id" => "4000",
            "role" => "pharmacy",
            "locality" => "lagos",

        ]);
        User::create([
            "name"=> "Pharmacy Admin Lag",
            "email" => "pharmacyadminlag@gmail.com",
            "password" => Hash::make("password"),
            "staff_id" => "5000",
            "role" => "pharmacy-admin",
            "locality" => "lagos",
        ]);
    }
}

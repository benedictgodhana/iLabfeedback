<?php
// DatabaseSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create a doctor user
        $doctorUserId = DB::table('users')->insertGetId([
            'name' => $faker->name,
            'email' => 'Ben@example.com', // Provide a specific email for the doctor
            'password' => Hash::make('password'), // Change 'password' to the desired password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed doctors table
        DB::table('doctors')->insert([
            'user_id' => $doctorUserId,
            'specialization' => $faker->word,
            'qualification' => $faker->word,
            'license_number' => $faker->word,
            'bio' => $faker->sentence,
            'contact_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more fields according to your table structure
    }
}

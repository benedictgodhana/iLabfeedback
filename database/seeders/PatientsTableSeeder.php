<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Patient;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// Assuming you are using Eloquent
        

        // Create a user with role 0 (patient)
        $user = User::create([
            'name' => 'John',
            'email' => 'John@gmail.com',
            'role' => 0, // Assuming 0 represents a regular user (patient)
            'password' => Hash::make('password'),
        ]);

        // Create a patient associated with the user
        Patient::create([
            'user_id' => $user->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '1990-01-01',
            'gender' => 'Male',
            'contact_number' => '123-456-7890',
            'address' => '123 Patient Street',
            // Add other patient-specific details as needed
        ]);
    }
}

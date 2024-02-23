<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Add any logic to display a list of doctors
    }

    public function create()
    {
        // Add any logic to display the form for creating a doctor
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'department' => 'required|string',
            'contact' => 'required|string',
            'specialization' => 'required|string',
            'qualification' => 'nullable|string',
            'license_number' => 'nullable|string',
            'bio' => 'nullable|string',
            'address' => 'nullable|string',
            // Add other validation rules as needed
        ]);

        // Create user record
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => User::DOCTOR_ROLE, // Assuming DOCTOR_ROLE is a constant representing the doctor role
        ]);

        // Create doctor record
        $doctor = Doctor::create([
            'user_id' => $user->id,
            'specialization' => $validatedData['specialization'],
            'qualification' => $validatedData['qualification'],
            'license_number' => $validatedData['license_number'],
            'bio' => $validatedData['bio'],
            'contact_number' => $validatedData['contact'],
            'address' => $validatedData['address'],
            // Add other doctor-specific fields as needed
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

}

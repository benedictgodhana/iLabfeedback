<?php

namespace App\Http\Controllers;

use App\Mail\ActivationEmail;
use App\Mail\activationmail;
use App\Mail\DeactivationEmail;
use App\Models\Item;
use App\Models\Appointment;
use App\Models\Room;
use App\Models\User;
use App\Models\Role;
use App\Models\Doctor;
use App\Notifications\FeedbackNotification;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use TCPDF;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|integer',
        ]);

        // Create the new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User added successfully.');
    }
}
    
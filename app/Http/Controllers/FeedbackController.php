<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackReceived;
use App\Mail\FeedbackAcknowledgement;
use Illuminate\Support\Facades\Redirect;


class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        $feedbackId = $request->input('id'); // Get the reservation ID from the form

        $feedbacks = Reservation::find($feedbackId);

        // Pass the reservation data to the view
        return view('feedback.create', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'contact' => 'nullable|string|max:20',
            'message' => 'required|string',
            'category_id' => 'nullable',
        ]);
    
        $feedback = new Feedback();
        $feedback->subject = $validatedData['subject'];
        $feedback->email = $validatedData['email'];
        $feedback->contact = $validatedData['contact'];
        $feedback->content = $validatedData['message'];
        $feedback->category_id = $validatedData['category_id'];
        $feedback->save();

        $recipientEmail = 'benedictgodhana7@gmail.com';
        Mail::to($recipientEmail)->send(new FeedbackReceived($feedback));
    
        // Send email notification to user if an email was provided
        if ($validatedData['email']) {
            Mail::to($validatedData['email'])->send(new FeedbackAcknowledgement($feedback));
        }
    
        return back()->with('success', 'Feedback submitted successfully!');
    }

    public function getFeedbackCategoriesData()
    {
        // Fetch feedback categories data from the database
        $feedbackCategoriesData = Category::withCount('feedbacks')->get();

        // Format the data for the chart
        $categories = $feedbackCategoriesData->pluck('name')->toArray();
        $counts = $feedbackCategoriesData->pluck('feedbacks_count')->toArray();

        // Return the data as JSON response
        return response()->json([
            'categories' => $categories,
            'counts' => $counts,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $reservation = Feedback::findOrFail($id);

        $reservation->status = $validatedData['status'];


        $reservation->save();
        
        // Redirect back to the previous page with a success message
        return Redirect::back()->with('success', 'Feedback status updated successfully.');    }

    
}

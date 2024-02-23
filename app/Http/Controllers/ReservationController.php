<?php

namespace App\Http\Controllers;

use App\Rules\RoomAvailability;
use App\Jobs\SendAdminReservationNotification;
use App\Jobs\SendMiniAdminReservationNotification;
use App\Jobs\SendSubAdminReservationNotification;
use App\Jobs\SendUserReservationNotification;
use App\Mail\AdmReservationCreated;
use App\Mail\MiniAdminReservationCreated;
use App\Mail\ReservationConfirmationMail;
use App\Mail\ReservationCreated;
use App\Mail\SubReservationCreated;
use App\Models\Activity;
use Illuminate\Support\Facades\DB; // Import DB facade
use App\Models\Item;
use App\Models\Appointment;
use App\Models\Room;
use App\Models\User;
use App\Models\Doctor;
use App\Notifications\AdminReservationNotification;
use App\Notifications\AdmReservationCreated as NotificationsAdmReservationCreated;
use App\Notifications\BookingAcceptedNotification;
use App\Notifications\BookingDeclinedNotification;
use App\Notifications\MiniAdminReservationNotification;
use App\Notifications\SubAdminReservationNotification;
use App\Notifications\SuperAdminReservationNotification;
use App\Notifications\UserReservationNotification;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function storeReservation(Request $request)
{
    // Validate the incoming request data, including the RoomAvailability rule
    $validatedData = $request->validate([
        'doctorName' => 'required|exists:users,id',
        'reason' => 'required|string',
        'doa' => 'required|date',
        'status' => 'required|string', // Corrected the validation rule
    ]);


    // Create a new reservation instance
    $reservation = new Appointment();
    $reservation->patient_id = auth()->user()->id; // Assuming you're using authentication
    $reservation->reason = $validatedData['reason'];
    $reservation->doctor_id = $validatedData['doctorName'];
    $reservation->appointment_datetime = $validatedData['doa'];
    $reservation->status = 'pending';

    // Save the reservation to the database
    $reservation->save();

    // Redirect back to the reservation status page with a success message
    return redirect()->back()->with('success', 'Reservation status updated successfully.');
}

    public function index()
    {
        $reservations = Reservation::all();
        $events = [];
    
        foreach ($reservations as $reservation) {
            $events[] = [
                'title' => $reservation->event, // Use the event details
                'start' => $reservation->reservationDate . 'T' . $reservation->reservationTime,
                'end' => $reservation->reservationDate . 'T' . $reservation->endTime,
                'room' => $reservation->room->name,
            ];
        }
    
        return view('events.index', compact('events'));
    }
    

        public function filterPendingReservations(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        // Perform the filtering query for pending reservations based on the date created
        $filteredReservations = Reservation::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'Pending') // Adjust this condition as needed
            ->orderBy('created_at', 'asc') // You can adjust the sorting as needed
            ->get();

        // Return the filtered reservations as JSON response
        return response()->json(['reservations' => $filteredReservations]);
    }

    public function cancelReservation($id)
    {
        // Find the reservation by its ID
        $reservation = Reservation::find($id);
    
        if (!$reservation) {
            // Handle the case where the reservation is not found
            return redirect()->back()->with('error', 'Reservation not found.');
        }
    
        // Additional cancellation logic
    
        $reservation->status = 'Cancelled';
        $reservation->save();
    
        return redirect()->back()->with('success', 'Reservation cancelled successfully.');
    }

    public function updateReservation(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'event' => 'required|string',
            'reservationDate' => 'required|date',
            'reservationTime' => 'required',
            'durationHours' => 'required|numeric',
            'durationMinutes' => 'required|numeric',
            'remarks' => 'nullable|string',
        ]);

        // Calculate the end time based on the selected duration
        $startTime = Carbon::parse($request->reservationDate . ' ' . $request->reservationTime);
        $duration = CarbonInterval::hours($request->durationHours)->minutes($request->durationMinutes);
        $endTime = $startTime->add($duration);

        // Find the reservation by ID
        $reservation = Reservation::findOrFail($id);

        // Update the reservation details
        $reservation->event = $request->event;
        $reservation->reservationDate = $request->reservationDate;
        $reservation->reservationTime = $request->reservationTime;
        $reservation->timelimit = $endTime;
        $reservation->remarks = $request->remarks;

        // Save the changes
        $reservation->save();

        // Redirect to a success page or return a response
        return redirect()->back()->with('success', 'Reservation updated successfully');
    }
    public function updateStatus(Request $request, $id)
    {
        // Find the reservation by ID
        $feedbacks = Reservation::findOrFail($id);
        
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:resolve,in_progress,rejected',
        ]);
        
        // Update the reservation status
        $feedbacks->update([
            'status' => $request->input('status'),
        ]);
        
        // Redirect back to the previous page with a success message
        return redirect()->back()->with('status', 'Feedback status updated successfully.');
    }
}
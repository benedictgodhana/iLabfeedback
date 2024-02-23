<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'appointment_datetime',
        'reason',
        'status',
        // Add other fields as needed
    ];

    // Define relationships if necessary
   

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id'); // assuming 'doctor_id' is the foreign key in the appointments table
}

}

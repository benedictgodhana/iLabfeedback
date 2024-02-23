<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable = [
        'user_id',
        'specialization',
        'qualification',
        'license_number',
        'bio',
        'contact_number',
        'address',
        'gender',
        'identification_number',
        'availability_schedule',
        'appointment_preferences',
        'profile_picture',
        // Add other doctor-specific fields as needed
    ];
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class);
    }
}

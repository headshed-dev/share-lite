<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentDuration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration_in_minutes',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'appointment_durations_id');
    }
}

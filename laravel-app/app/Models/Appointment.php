<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_durations_id',
        'appointment_date',
    ];

    public function appointmentDuration()
    {
        return $this->belongsTo(AppointmentDuration::class, 'appointment_durations_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'appointment_date', 'status', 'reason'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

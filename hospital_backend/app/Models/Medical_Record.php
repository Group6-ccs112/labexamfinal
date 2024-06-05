<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_Record extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'visit_date', 'diagnosis', 'treatment', 'notes'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    
    
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

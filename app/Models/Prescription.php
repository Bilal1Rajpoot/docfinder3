<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';
    protected $fillable = [
        'name_of_dose',
        'quantity',
        'description',
        'patient_id',
        'doctor_id',
        'appointment_id',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id' );
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id' );
    }
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment', 'appointment_id' );
    }

}

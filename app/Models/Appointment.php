<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'slot_id',
        'appointment_date',
        'appointment_time',
        'purpose',
        'status',
        'paid_amount',
        'link',
        'is_join',

    ];

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
    public function patient(){
        return $this->belongsTo('App\Models\Patients');
    }
    public function timeSlots(){

        return $this->belongsTo('App\Models\TimeSlots', 'slot_id');
    }
    public function prescriptions(){

        return $this->hasMany('App\Models\Prescription');
    }


}

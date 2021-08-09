<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date',
        'review',
        'rating',
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patients', 'patient_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'doctors_specializations';
    protected $fillable = [
        'specialization',

    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'doctors_schedule';
    function timeSlots()
    {
        return $this->hasMany('App\Models\TimeSlots');
    }

}

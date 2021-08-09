<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    protected $table = 'doctors_slots';

    protected $fillable = [
      'is_available',
        'slot_start_time',

    ];

    public function appointments(){
        return $this->hasMany('App\Models\Appointment');
    }

}

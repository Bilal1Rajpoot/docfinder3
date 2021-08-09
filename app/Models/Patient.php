<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    function appointments()
    {
        return $this->hasMany('App\Models\Appointments');
    }
    function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}

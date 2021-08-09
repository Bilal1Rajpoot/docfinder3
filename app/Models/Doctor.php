<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $fillable = [
        'image',
        'is_verified',
        'first_name',
        'last_name',
        'user_name',

    ];
    function address()
    {
        return $this->hasOne('App\Models\Address');
    }
    function awards()
    {
        return $this->hasMany('App\Models\Award');
    }
    function clinic()
    {
        return $this->hasOne('App\Models\Clinic');
    }
    function experience()
    {
        return $this->hasMany('App\Models\Experience');
    }
    function qualification()
    {
        return $this->hasMany('App\Models\Qualification');
    }
    function schedule()
    {
        return $this->hasMany('App\Models\Schedule');
    }
    function services()
    {
        return $this->hasMany('App\Models\Service');
    }
    function specialization()
    {
        return $this->hasMany('App\Models\Specialization');
    }
    function timeSlots()
    {
        return $this->hasMany('App\Models\TimeSlots');
    }
    function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    function socialmedia()
    {
        return $this->hasOne('App\Models\SocialMedia');
    }
    function bookmarks()
    {
        return $this->hasMany('App\Models\Bookmark');
    }
    function prescriptions()
    {
        return $this->hasMany('App\Models\Prescription');
    }
}

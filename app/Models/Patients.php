<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;

class Patients extends Model
{
    use HasFactory;


    protected $table = 'patientss';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'blood_group',
        'email',
        'mobile_number',
        'address',
        'state',
        'city',
        'zip_code',
        'country',
        'password',
    ];


    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    public function medicalRecords(){
        return $this->hasMany('App\Models\MedicalRecord');
    }

    public function bookmarks(){

        return $this->hasMany('App\Models\BookMark');
    }
    public function prescriptions(){

        return $this->hasMany('App\Models\Prescription');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }



}

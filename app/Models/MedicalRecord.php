<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_records';
    protected $fillable = [
        'type',
        'doctor',
        'file_path',
        'description',
    ];

    public function patient(){

        return $this->belongsTo('App\Models\Patients');
    }
}

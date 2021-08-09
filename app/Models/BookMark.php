<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
    ];

    protected $table = 'bookmarks';

    public function patient(){
        return $this->belongsTo('App\Models\Patients');
    }
    public function doctor(){
        return $this->belongsTo('App\Models\Doctor', 'doctors_id');
    }
}

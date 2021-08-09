<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'doctors_services';
    protected $fillable = [
        'services',
        
    ];
}

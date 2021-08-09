<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    use HasFactory;


    protected $table = 'admins';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'email',
        'mobile_number',
        'address',
        'state',
        'city',
        'zip_code',
        'country',
        'password',
        'image_path',
        'role'
    ];





}

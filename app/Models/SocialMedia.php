<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $table = 'doctors_social_media';
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'pinterest',
        'linkedin',
        'youtube',
    ];
}
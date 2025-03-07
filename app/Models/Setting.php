<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'description',
        'owner',
        'about_owner',
        'email',
        'telephone',
        'nro_whatsapp',
        'url_facebook',
        'url_instagram',
        'url_youtube',
        'address',
        'schedule',
        'latitude',
        'longitude',
        'slug',
        'logo',
        'static_banner',

    ];

    use HasFactory;
}

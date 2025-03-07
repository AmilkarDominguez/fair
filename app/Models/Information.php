<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'mission',
        'photo',
        'view',
        'adress',
        'phone',
        'whatsapp',
        'email',
        'facebook',
        'instagram',
        'description',
        'slug',
        'state'
    ];
}

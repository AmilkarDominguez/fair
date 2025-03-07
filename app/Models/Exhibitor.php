<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'direction',
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

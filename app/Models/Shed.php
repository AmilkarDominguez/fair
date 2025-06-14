<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shed extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'amount',
        'location',
        'description',
        'slug',
        'state'
    ];

}

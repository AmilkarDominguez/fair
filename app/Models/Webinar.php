<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    protected $fillable = [
        'pavilion_id',
        'title',
        'exhibitor_name',
        'logo',
        'photo',
        'link',
        'start_time',
        'end_time',
        'date',
        'description',
        'slug',
        'state'
    ];
}

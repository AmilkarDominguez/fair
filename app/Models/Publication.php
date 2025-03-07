<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_id',
        'name',
        'photo',
        'link',
        'tipe',
        'slug',
        'state'
    ];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
}

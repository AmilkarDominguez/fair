<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pavilion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fair_id',
        'name',
        'photo',
        'description',
        'slug',
        'state'
    ];
    public function stands()
    {
        return $this->hasMany(Stand::class)->withTimestamps();
    }
}

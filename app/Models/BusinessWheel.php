<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessWheel extends Model
{
    use HasFactory;
    protected $fillable = [
        'link',
        'description'
    ];
    public function stands()
    {
        return $this->hasMany(Stand::class)->withTimestamps();
    }
}
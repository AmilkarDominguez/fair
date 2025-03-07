<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'amount',
        'slug',
        'state'
    ];
    public function business_wheels()
    {
        return $this->hasMany(Business_wheel::class)->withTimestamps();
    }
}

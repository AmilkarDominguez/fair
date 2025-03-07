<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address'
    ];
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}

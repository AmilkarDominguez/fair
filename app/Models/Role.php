<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'slug',
        'state'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}

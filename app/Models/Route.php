<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'team',
        'zone_id',
        'description',
        'slug',
        'state'
    ];
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
    public function medidores()
    {
        return $this->hasMany(Meter::class);
    }
}

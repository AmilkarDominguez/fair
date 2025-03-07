<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'pavilion_id',
        'contact_name',
        'contact_phone',
        'company_name',
        'request_state',
        'slug',
        'state'
    ];

    public function pavilion()
    {
        return $this->belongsTo(Pavilion::class)->withTimestamps();
    }
}

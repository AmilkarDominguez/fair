<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;
    protected $fillable = [
        'pavilion_id',
        'logo',
        'url_video',
        'banner_a',
        'banner_b',
        'banner_c',
        'banner_d',
        'banner_e',
        'name',
        'description',
        'web_site',
        'facebook',
        'whatsapp',
        'youtube',
        'instagram',
        'slug',
        'state'
    ];
    public function stand_request()
    {
        return $this->hasMany(StandRequest::class)->withTimestamps();
    }
    public function pavilion()
    {
        return $this->belongsTo(Pavilion::class)->withTimestamps();
    }
    public function products()
    {
        return $this->hasMany(Product::class)->withTimestamps();
    }
}

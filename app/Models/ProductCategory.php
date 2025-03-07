<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'stand_id',
        'name',
        'description',
        'slug',
        'state'
    ];
    public function stand()
    {
        return $this->belongsTo(Stand::class)->withTimestamps();
    }
}

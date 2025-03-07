<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'photo',
        'link',
        'url_video',
        'slug',
        'state'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class)->withTimestamps();
    }
}

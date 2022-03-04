<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
    public function products()
    {
        return $this->hasOne(Product::class);
    }
}

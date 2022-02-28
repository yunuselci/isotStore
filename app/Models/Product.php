<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function shops()
    {
        return $this->belongsToMany(
            Shop::class,
            'products_shops',
            'product_id',
            'shop_id');
    }
}

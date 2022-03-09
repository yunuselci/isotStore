<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}

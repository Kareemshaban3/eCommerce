<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    function product()  {
        return $this->belongsTo(Product::class);
    }
}

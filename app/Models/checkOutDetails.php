<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkOutDetails extends Model
{
    public function checkOut()
    {
        return $this->belongsTo(checkOut::class, 'check_out_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

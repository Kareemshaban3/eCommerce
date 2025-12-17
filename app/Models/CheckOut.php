<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkOut extends Model
{
    protected $table = 'check_outs'; // اسم الجدول
    public function checkOutDetails()
    {
        return $this->hasMany(CheckOutDetails::class, 'check_out_id');
    }

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

}

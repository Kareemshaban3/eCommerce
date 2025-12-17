<?php

namespace App\Http\Controllers;

use App\Models\checkOut;
use Illuminate\Http\Request;

class OrderFinishedController extends Controller
{
    public function OrderFinished()
    {
        $authUser = auth()->id();
        $result = checkOut::with('checkOutDetails')->where('user_id' , $authUser)->get();
        $resultAdmin = checkOut::with('checkOutDetails')->get();

        return view(
            'OrderFinished',
            [
                'title' => "Order Finished",
                'subtitle' => 'Fresh and Organic',
                'orders' => $result,
                'ordersAdmin' => $resultAdmin,
            ]
        );
    }
}

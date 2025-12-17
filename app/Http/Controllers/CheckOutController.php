<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\checkOut;
use App\Models\checkOutDetails;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function CheckOutHandler(Request $request)
    {
        $products = $request->input('products', []);
        $tip = $request->input('tip', 0);
        $finalTotal = $request->input('final_total', 0);

        $user_id = auth()->id();
        $items = Cart::with('product')->where('user_id', $user_id)->get();
        // Example: loop through products
        foreach ($products as $product) {
            $name = $product['name'];
            $price = $product['price'];
            $quantity = $product['quantity'];
        }


        return view(
            'CheckOut',
            [
                'title' => "Check Out Product",
                'subtitle' => 'Fresh and Organic',
                'products' => $products,
                'finalTotal' => $finalTotal,
                'items' => $items,
                'tip' => $tip
            ]
        );
    }
    public function storeCheckout(Request $request)
    {

        $newCheckout = new checkOut();
        $newCheckout->name = $request->input('name');
        $newCheckout->email = $request->input('email');
        $newCheckout->address = $request->input('address');
        $newCheckout->phone = $request->input('phone');
        $newCheckout->note = $request->input('note');
        $user_id = auth()->id();
        $newCheckout->user_id = $user_id;
        $newCheckout->save();

        $cartProducts =  Cart::with('product')->where('user_id', $user_id)->get();

        foreach ($cartProducts as $cartItem) {

            $newCheckoutDetails = new checkOutDetails();
            $newCheckoutDetails->product_id = $cartItem->product->id;
            $newCheckoutDetails->quantity = $cartItem->quantity;
            $newCheckoutDetails->price = $cartItem->product->price;
            $newCheckoutDetails->check_out_id = $newCheckout->id;
            $newCheckoutDetails->save();


            Cart::where('user_id', $user_id)->delete();
        }
        return redirect()->route('homePage')->with('success', __('string.success'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function HandelCart()
    {
        $user_id = auth()->id();

        $items = Cart::with('product')->where('user_id', $user_id)->get();

        return view('Product.Cart', [
            'title' => "Shopping Cart",
            'subtitle' => 'Fresh and Organic',
            'items' => $items,
        ]);
    }

    public function addToCart($productId)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to add items to cart.');
        }

        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $existingItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingItem) {
            $existingItem->quantity += 1;
            $existingItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', __('string.add_success') );
    }


    public function DeleteCart($productId)
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();
        if ($cartItems) {
            $cartItems->delete();
            return redirect()->back()->with('success',  __('string.success_remove_cart'));
        } else {

            return redirect()->back()->with('error', 'Product not Deleted.');
        }
    }

    public function decreaseQuantity($productId)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in first.');
        }

        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
                return redirect()->back()->with('success', __('string.Quantity_decreased'));
            } else {
                $cartItem->delete();
                return redirect()->back()->with('success', __('string.success_remove_cart'));
            }
        }

        return redirect()->back()->with('error', 'Product not found in cart.');
    }

    public function addCartFromSinglePage(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);
        $product = Product::findOrFail($id);

        // لو المستخدم مسجل دخول
        $userId = auth()->check() ? auth()->id() : null;

        // تحقق إذا المنتج موجود بالفعل في السلة
        $existing = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($existing) {
            $existing->quantity += $quantity;
            $existing->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }


        return redirect()->back()->with('success', __('string.add_success') );
    }
}

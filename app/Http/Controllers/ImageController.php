<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public function addProductImage($ProductId)
    {
        $product = Product::find($ProductId);
        $ProductImage = ProductImage::where('product_id', $ProductId)->get();

        return view('Product.addProductImage', [
            'currentProduct' => $product,
            'AllProductImage' => $ProductImage,
            'title' => 'Add Product Image',
            'subtitle' => 'Enhance your product with more images'
        ]);
    }

    public function storeProductImages(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ProductImage = new ProductImage();
        $ProductImage->product_id = $request->ProductId;

        $imageName = Str::uuid() . '_' . $request->photo->getClientOriginalName();
        $ProductImage->imagePath = $request->photo->move('uploads', $imageName);

        $ProductImage->save();

        return redirect()->back()->with('success', __('string.success_remove_image'));
    }

    public function RemoveProductImage($imageId = null)
    {
        if (!$imageId) {
            abort(403, 'Please enter a valid Image ID.');
        }

        $Product = ProductImage::find($imageId);


        if (!$Product) {
            return redirect()->back()->with('error', '❌ Image not found!');
        }

        $Product->delete();

        return redirect()->back()->with('success',__('string.success_remove_image'));
    }
}

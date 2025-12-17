<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function ProductPage($catId = null)
    {
        $category = Category::find($catId);
        $categoryName = $category ? $category->name : '';

        if (!$catId) {
            $allCategories = Category::all();
            $products = Product::paginate(12);

            return view('product', [
                'products' => $products,
                'categoryName' => $categoryName,
                'AllCategory' => $allCategories,
                'title' => 'Products',
                'subtitle' => 'Everything you need, all in one place'
            ]);
        }

        $products = Product::where('category_id', $catId)->paginate(12); // ✅ تعديل هنا

        return view('product', [
            'products' => $products,
            'categoryName' => $categoryName,
            'title' => 'Products',
            'subtitle' => 'Everything you need, all in one place'
        ]);
    }

    public function AddProduct()
    {
        $categories = Category::all();

        return view('Product.addProduct', [
            'CategoryName' => $categories,
            'title' => 'Add Product',
            'subtitle' => 'List your item and start selling now'
        ]);
    }


    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:products', 'max:25'],
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'imagePath' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->name_ar = $request->name_ar;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->description_ar = $request->description_ar;


        $imageName = Str::uuid() . '_' . $request->imagePath->getClientOriginalName();
        $product->imagePath = $request->imagePath->move('uploads', $imageName);

        $product->save();

        return redirect()->route('products.create')->with('success', __('string.Product_add'));
    }




    public function RemoveProduct($productId = null)
    {
        if (!$productId) {
            abort(403, 'Please enter a valid product ID.');
        }

        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', '❌ Product not found!');
        }

        $product->delete();

        return redirect()->back()->with('success',  __('string.Product_remove'));
    }


    public function EditProduct($productId = null)
    {
        if (!$productId) {
            abort(403, 'Please enter a valid product ID.');
        }

        $product = Product::find($productId);

        if (!$product) {
            abort(403, 'Cannot find this product.');
        }

        $categories = Category::all();

        return view('Product.editProduct', [
            'currentProduct' => $product,
            'categoryName' => $categories,
            'title' => 'Edit Product',
            'subtitle' => 'Update your item to make it shine'
        ]);
    }

    public function UpdateProduct(Request $request, $productId)
    {
        $product = Product::find($productId);

        $product->name = $request->name;
        $product->name_ar = $request->name_ar;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->description_ar = $request->description_ar;

        if ($request->hasFile('imagePath')) {
            $imageName = Str::uuid() . '_' . $request->imagePath->getClientOriginalName();
            $product->imagePath = $request->imagePath->move('uploads', $imageName);
        }

        $product->save();

        return redirect()->route('products.index')->with('success', __('string.Product_updated'));
    }


    public function searchProduct(Request $request)
    {
        $searchKey = $request->searchKey;

        $products = Product::where('name', 'like', '%' . $searchKey . '%')->paginate(12);
        if ($products->isEmpty()) {
            return redirect()->route('products.index')->with('error', '🔍 No products found matching your search criteria.');
        }

        return view('product', [
            'products' => $products,
            'categoryName' => '',
            'title' => 'Search Results',
            'subtitle' => 'Products matching your search'
        ]);
    }



    public function SingleProduct($ProductId)
    {

        if (!$ProductId) {
            abort(403, 'Please enter a valid product ID.');
        }

        $itemProductImage = ProductImage::where('product_id', $ProductId)->get();
        $ItemProduct = Product::find($ProductId);
        if (!$ItemProduct) {
            abort(403, 'Cannot find this product.');
        }

        $key = 'viewed_product_' . $ProductId;
        if (!request()->cookie($key)) {
            $ItemProduct->increment('views');
            cookie()->queue($key, true, 120);
        };
        $category = Category::find($ItemProduct->category_id);
        $categoryName = $category ? $category->name : '';

        $AllProducts = Product::where('category_id', $ItemProduct->category_id)->paginate(6);
        return view("Product.SingleProduct", [
            'title' => 'Single Product',
            'subtitle' => "See more Details",
            'ItemProduct' => $ItemProduct,
            'itemProductImage' => $itemProductImage,
            'categoryName' => $categoryName,
            'AllProducts' => $AllProducts,
        ]);
    }
}

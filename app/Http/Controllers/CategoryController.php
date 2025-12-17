<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Reviews;

class CategoryController extends Controller
{
    public function HomePage()
    {
        $categories = Category::all();
        $reviews = Reviews::all();

        return view('welcome', [
            'categories' => $categories,
            'Reviews' => $reviews, // إذا كنت تستخدمه بهذا الشكل في الـ Blade
        ]);
    }

    public function CategoryPage()
    {
        $allCategories = Category::all();
        $allProducts = Product::all();

        return view('allCategory', [
            'AllCategory' => $allCategories,
            'AllProduct' => $allProducts,
            'title' => 'Categories',
            'subtitle' => 'Shop by type, style, or trend'
        ]);
    }
}

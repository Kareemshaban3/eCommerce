<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\checkOutDetails;
use App\Models\checkOut;
use App\Models\User;

class AdminController extends Controller
{
    public function AdminController()
    {

        $products = Product::all();

        return view('Admin.AdminController', [
            'title' => "Admin Controller",
            'subtitle' => "Welcome to Admin Controller Page",
            'products' => $products
        ]);
    }


    public function AdminPanel()
    {

        return view('Admin.adminPanel');
    }

    public function apiIndex()
    {

        $countProduct = Product::count();
        $CountUsers = User::count();
        $CountOrder = checkOutDetails::count();
        $TotalPriceSales = checkOutDetails::sum('price');
        $avgOrderValue = checkOutDetails::sum('price') / $CountOrder;


        $currentMonthSales = checkOutDetails::whereMonth('created_at', now()->month)->sum('price');
        $lastMonthSales = checkOutDetails::whereMonth('created_at', now()->subMonth()->month)->sum('price');

        $salesChange = $lastMonthSales > 0
            ? (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100
            : 0;


        $currentMonthCustomers = User::whereMonth('created_at', now()->month)->count();
        $lastMonthCustomers = User::whereMonth('created_at', now()->subMonth()->month)->count();

        $customersChange = $lastMonthCustomers > 0
            ? (($currentMonthCustomers - $lastMonthCustomers) / $lastMonthCustomers) * 100
            : 0;


        $currentMonthProducts = Product::whereMonth('created_at', now()->month)->count();
        $lastMonthProducts = Product::whereMonth('created_at', now()->subMonth()->month)->count();

        $productsChange = $lastMonthProducts > 0
            ? (($currentMonthProducts - $lastMonthProducts) / $lastMonthProducts) * 100
            : 0;

        $currentMonthAvgOrder = checkOutDetails::whereMonth('created_at', now()->month)->avg('price');
        $lastMonthAvgOrder = checkOutDetails::whereMonth('created_at', now()->subMonth()->month)->avg('price');

        $avgOrderChange = $lastMonthAvgOrder > 0
            ? (($currentMonthAvgOrder - $lastMonthAvgOrder) / $lastMonthAvgOrder) * 100
            : 0;





        // Top Selling Products

        $topProducts = checkOutDetails::selectRaw('product_id, SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->with('product')
            ->get();



        // order list

        $CustomerOrders = checkOut::get();
        $totalsOrders = checkOutDetails::select('check_out_id')
            ->selectRaw('SUM(price) as total_price')
            ->groupBy('check_out_id')
            ->get();

        $OrderDetails = checkOutDetails::get();





        // Category

        $category = Category::get();






        return response()->json([
            'countProduct' => $countProduct,
            'CountUsers' => $CountUsers,
            'CountOrder' => $CountOrder,
            'TotalPriceSales' => $TotalPriceSales,
            'avgOrderValue' => $avgOrderValue,
            'salesChange' => $salesChange,
            'customersChange' => $customersChange,
            'productsChange' => $productsChange,
            'avgOrderChange' => $avgOrderChange,
            'topProducts' =>    $topProducts,
            'CustomerOrders' => $CustomerOrders,
            'OrderDetails' =>  $OrderDetails,
            'totalsOrders' => $totalsOrders,
            'category' => $category,
        ]);
    }

    public function Customers()
    {


        $CustomerOrders = checkOut::with('user', 'checkOutDetails')->get();




        return view('admin.Customers', [

            'CustomerOrders' => $CustomerOrders,


        ]);
    }

    public function product()
    {
        $products = Product::all();

        return view('admin.productAdmin', [
            'products' => $products
        ]);
    }

    public function orders()
    {

        return view('admin.orders');
    }

}

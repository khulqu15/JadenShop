<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(4);
        $products = Product::paginate(4);
        $latest_category = Category::latest()->first();
        $latest_product = Product::latest()->first();
        return view('dashboard', compact('categories', 'products', 'latest_category', 'latest_product'));
    }
}

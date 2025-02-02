<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->query('category', 'all');
        $products = $selectedCategory === 'all' ? Product::all() : Product::where('id_category', $selectedCategory)->get();

        return view('products.index', compact('categories', 'products', 'selectedCategory'));
    }

    public function filterByCategory($categoryId)
    {
        $categories = Category::all();
        $products = Product::where('id_category', $categoryId)->get();
        return view('products.index', compact('categories', 'products'))->with('selectedCategory', $categoryId);
    }

    
}

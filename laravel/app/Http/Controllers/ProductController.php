<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products= Product::orderBy('created_at','desc')->get();
        return view('products.index',compact('products'));
    }

    

    
}

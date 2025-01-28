<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function categorycreate(){
        return "Crear categoria";
    }

    public function index(){
        $products= Product::orderBy('created_at','desc')->get();
        return view('admin.index',compact('products'));
    }
}

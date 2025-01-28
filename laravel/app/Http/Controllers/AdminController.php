<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function categorycreate(){
        return view('admin.categorycreate');
    }

    public function index(){
        return view('admin.index');
    }

    public function addctg(Request $request){

        // Verificar si la categoría ya existe
        $existingCategory = Category::where('category_n', $request->input('category_n'))->first();
        if ($existingCategory) {
            return redirect()->back()->with('error', 'La categoría ya existe.');
        }

        // Guardar la nueva categoría
        $newCategory = new Category;
        $newCategory->category_n = $request->input('category_n');
        $newCategory->save();

        return redirect()->route('admin.index')->with('success', 'Categoría añadida exitosamente');
    }
}

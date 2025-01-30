<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

    public function list(){
        $categories= Category::all();
        return view('admin.categorylist', compact('categories'));
    }

    public function deleteCategory($id){
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categorylist');
    }

    public function Ceditview($id){
        $category= Category::findOrFail($id);
        return view('admin.categoryedit', compact('category'));
    }

    public function categoryUpdate(Request $request,$id){
        $category= Category::findOrFail($id);
        $category->category_n=$request->input('category_n');
        $category->save();
        return redirect()->route('admin.categorylist');
    }

    public function create()
    {
        // Obtener categorías de la base de datos
        $category = Category::all();
        return view('admin.productcreate', compact('category'));
    }

    public function addproduct(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'id_category' => 'required|exists:categories,id', 
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
    
        // Crear el producto
        $product = Product::create($request->only('description', 'price', 'id_category'));
    
       
    if ($request->hasFile('image')) {
        $product->addMedia($request->file('image'))
            ->usingFileName($request->file('image')->getClientOriginalName()) 
            ->toMediaCollection('images', 'public');  
    }
    

    return redirect()->route('admin.index')->with('success', 'Producto añadido exitosamente.');
    }


        /**
     * Sube una imagen a la colección de medios del modelo especificado.
     * 
     * @param \Illuminate\Database\Eloquent\Model $model El modelo al que se le asociará la imagen.
     * @param \Illuminate\Http\UploadedFile $file El archivo de imagen subido.
     * @return void
     * @throws \Exception Si el archivo no es válido.
     */

    
    
    

    

}

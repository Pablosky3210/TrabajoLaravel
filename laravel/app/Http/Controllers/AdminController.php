<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    
    // Muestra la vista principal del panel de administración.
    public function index(){
        return view('admin.index');
    }

    // Muestra la vista para crear una nueva categoría.
    public function categorycreate(){
        return view('admin.categorycreate');
    }
    
    // Añade una nueva categoría a la base de datos.
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

    // Muestra una lista de todas las categorías.
    public function list(){
        $categories= Category::all();
        return view('admin.categorylist', compact('categories'));
    }

    // Elimina una categoría de la base de datos.
    // Si hay productos asociados a la categoría, no se puede eliminar.
    public function deleteCategory($id)
    {
    // Encuentra la categoría o lanza un error si no existe
    $category = Category::findOrFail($id);

    // Comprueba si hay productos asociados a esta categoría
    $productsCount = Product::where('id_category', $id)->count();

    // Si hay productos asociados, redirige con un mensaje de error
    if ($productsCount > 0) {
        return redirect()->route('admin.categorylist')->with('error', 'No se puede eliminar la categoría porque hay productos asociados.');
    }

    // Elimina la categoría
    $category->delete();

    // Redirige con un mensaje de éxito
    return redirect()->route('admin.categorylist')->with('success', 'Categoría eliminada exitosamente.');
    }

    // Muestra la vista para editar una categoría específica.
    public function Ceditview($id){
        $category= Category::findOrFail($id);
        return view('admin.categoryedit', compact('category'));
    }

    // Actualiza una categoría existente en la base de datos.
    public function categoryUpdate(Request $request,$id){
        $category= Category::findOrFail($id);
        $category->category_n=$request->input('category_n');
        $category->save();
        return redirect()->route('admin.categorylist');
    }

    // Muestra la vista para crear un nuevo producto.
    public function create()
    {
        // Obtener categorías de la base de datos
        $category = Category::all();
        return view('admin.productcreate', compact('category'));
    }

    // Añade un nuevo producto a la base de datos.
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

    // Muestra una lista de todos los productos.
    public function productlist(){
        $products= Product::all();
        return view('admin.productlist', compact('products'));
    }

    // Muestra la vista para editar un producto específico.
    public function productedit($id){
        $product= product::findOrFail($id);
        return view('admin.productedit', compact('product'));
    }

    // Actualiza un producto existente en la base de datos.
    public function productUpdate(Request $request,$id){
        $product= product::findOrFail($id);
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->save();
        return redirect()->route('admin.productlist');
    }

    // Elimina un producto de la base de datos.
    public function deleteproduct($id){
        $product=product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.productlist');
    }


    
    
    

    

}

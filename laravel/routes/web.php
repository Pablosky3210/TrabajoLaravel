<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function(){
    // Ruta para mostrar la vista principal del panel de administración
    Route::get('admin','AdminController@index')->name('admin.index');

    // Rutas para crear una nueva categoría
    Route::get('admin/categorycreate','AdminController@categorycreate')->name('admin.category');
    Route::post('admin/categorycreate','AdminController@addctg')->name('admin.addctg');

    // Ruta para mostrar la lista de todas las categorías
    Route::get('admin/categorylist','AdminController@list')->name('admin.categorylist');

    // Ruta para eliminar una categoría específica
    Route::delete('admin/categorylist/{id}', 'AdminController@deleteCategory')->name('admin.categorydelete');

    // Rutas para editar una categoría específica
    Route::get('admin/{id}/categoryedit', 'AdminController@Ceditview')->name('admin.categoryedit');
    Route::put('admin/admin/{id}', 'AdminController@categoryUpdate')->name('admin.categoryupdate');

    // Rutas para crear un nuevo producto
    Route::get('admin/productcreate','AdminController@create')->name('admin.productcreate');
    Route::post('admin/productcreate','AdminController@addproduct')->name('admin.addproduct');

    // Ruta para mostrar la lista de todos los productos
    Route::get('admin/productlist','AdminController@productlist')->name('admin.productlist');

    // Rutas para editar un producto específico
    Route::get('admin/{id}/productedit', 'AdminController@productedit')->name('admin.productedit');
    Route::put('/adminadmin/admin/{id}','AdminController@productUpdate')->name('admin.productupdate');
    
    // Ruta para eliminar un producto específico
    Route::delete('admin/productlist/{id}', 'AdminController@deleteproduct')->name('admin.productdelete');

    Route::get('admin/createanuncio','AdminController@createanuncio')->name('admin.createanuncio');
    Route::post('admin/createanuncio', 'AdminController@addanuncio')->name('admin.addanuncio');

    Route::get('admin/anunciolist', 'AdminController@anunciolist')->name('admin.anunciolist');

    Route::delete('admin/anunciolist/{id}', 'AdminController@deleteanuncio')->name('admin.anunciodelete');

    // Rutas para editar un producto específico
    Route::get('admin/{id}/anuncioedit', 'AdminController@anuncioedit')->name('admin.anuncioedit');
    Route::put('admin/{id}','AdminController@anuncioUpdate')->name('admin.anuncioupdate');
});
// Ruta para mostrar la vista pública de los productos
Route::get('products','ProductController@index')->name('products.index');

// Ruta para filtrar los productos por categoría
Route::get('/category/{categoryId}', 'ProductController@filterByCategory')->name('products.filter');

Route::get('/anuncios/filterByDate', 'ProductController@filterByDate')->name('products.filterByDate');

Route::get('products/anuncios', 'ProductController@anunciosview')->name('products.anuncios');

Route::get('/activity','ProductController@updatedActivity');


Auth::routes();



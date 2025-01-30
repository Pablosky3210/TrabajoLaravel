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
    

    Route::get('admin','AdminController@index')->name('admin.index');

    Route::get('admin/categorycreate','AdminController@categorycreate')->name('admin.category');

    Route::post('admin','AdminController@addctg')->name('admin.addctg');

    Route::get('admin/categorylist','AdminController@list')->name('admin.categorylist');

    Route::delete('admin/categorylist/{id}', 'AdminController@deleteCategory')->name('admin.categorydelete');

    Route::get('admin/{id}/categoryedit', 'AdminController@Ceditview')->name('admin.categoryedit');

    Route::put('admin/{id}','AdminController@categoryUpdate')->name('admin.categoryupdate');

    Route::get('admin/productcreate','AdminController@create')->name('admin.productcreate');

    Route::post('admin','AdminController@addproduct')->name('admin.addproduct');
});
Route::get('products','ProductController@index')->name('products.index');

Auth::routes();


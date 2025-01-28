<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
});
Route::get('products','ProductController@index')->name('products.index');

Auth::routes();


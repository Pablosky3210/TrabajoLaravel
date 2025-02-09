<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Anuncio;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->query('category', 'all');
        $products = $selectedCategory === 'all' ? Product::all() : Product::where('id_category', $selectedCategory)->get();

        $anuncios=Anuncio::all();

        return view('products.index', compact('categories', 'products', 'selectedCategory','anuncios'));
    }

    public function filterByCategory($categoryId)
    {
        $categories = Category::all();
        $products = Product::where('id_category', $categoryId)->get();
        return view('products.index', compact('categories', 'products'))->with('selectedCategory', $categoryId);
    }


    public function filterByDate() {
        // Obtén la fecha actual
        $today = Carbon::now();

        // Consulta para obtener los anuncios cuya fecha de inicio es menor o igual a la fecha actual
        // y la fecha de finalización es mayor o igual a la fecha actual
        $anuncios = Anuncio::where('date_start', '<=', $today)
                    ->where('date_end', '>=', $today)
                    ->get();

        return view('products.anuncios', compact('anuncios'))->with('selectedCategory', 'all');
    }

    public function anunciosview(){
        $anuncios=Anuncio::all();
        return view('products.anuncios', compact('anuncios'));
    }

    public function updatedActivity(){
        $text='sadsadsa';

        \Telegram::sendMessage([
            'chat_id'=>env('TELEGRAM_CHANNEL_ID',''),
            'parse_mode'=>'HTML',
            'text'=>$text
        ]);
    }


    
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Crear las categorías
        Category::create([
            'category_n' => 'Pescado',
        ]);
        
        Category::create([
            'category_n' => 'Mariscos',
        ]);
        
        Category::create([
            'category_n' => 'Carnes',
        ]);
        
        Category::create([
            'category_n' => 'Frutas',
        ]);
        
        Category::create([
            'category_n' => 'Verduras',
        ]);
    }
}

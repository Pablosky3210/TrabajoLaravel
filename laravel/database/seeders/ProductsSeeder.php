<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Nombres de los productos
        $products = [
            ['description' => 'Salmón', 'price' => 25.50, 'id_category' => 1], // Pescado
            ['description' => 'Atún', 'price' => 15.75, 'id_category' => 1], // Pescado
            ['description' => 'Camarones', 'price' => 30.00, 'id_category' => 2], // Mariscos
            ['description' => 'Pulpo', 'price' => 40.00, 'id_category' => 2], // Mariscos
            ['description' => 'Pechuga de Pollo', 'price' => 12.99, 'id_category' => 3], // Carnes
            ['description' => 'Costillas de Cerdo', 'price' => 35.99, 'id_category' => 3], // Carnes
            ['description' => 'Manzana', 'price' => 3.99, 'id_category' => 4], // Frutas
            ['description' => 'Banana', 'price' => 1.99, 'id_category' => 4], // Frutas
            ['description' => 'Zanahorias', 'price' => 2.50, 'id_category' => 5], // Verduras
            ['description' => 'Tomate', 'price' => 4.00, 'id_category' => 5], // Verduras
        ];

        // Crear 10 productos
        foreach ($products as $index=> $product) {
            $newProduct=Product::create([
                'description' => $product['description'],
                'price' => $product['price'],
                'id_category' => $product['id_category']
            ]);
        }
        
    }
}

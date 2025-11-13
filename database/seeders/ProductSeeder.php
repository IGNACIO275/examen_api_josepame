<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Producto 1',
                'price' => 470,
                'description' => 'Descripción del producto 1',
                'category_id' => 1,
                'company_id' => 1,
                'quantity' => 10,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 2',
                'price' => 320,
                'description' => 'Descripción del producto 2',
                'category_id' => 2,
                'company_id' => 2,
                'quantity' => 5,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 3',
                'price' => 150,
                'description' => 'Descripción del producto 3',
                'category_id' => 3,
                'company_id' => 3,
                'quantity' => 20,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 4',
                'price' => 200,
                'description' => 'Descripción del producto 4',
                'category_id' => 1,
                'company_id' => 2,
                'quantity' => 8,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 5',
                'price' => 550,
                'description' => 'Descripción del producto 5',
                'category_id' => 2,
                'company_id' => 1,
                'quantity' => 15,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 6',
                'price' => 400,
                'description' => 'Descripción del producto 6',
                'category_id' => 3,
                'company_id' => 3,
                'quantity' => 12,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 7',
                'price' => 275,
                'description' => 'Descripción del producto 7',
                'category_id' => 1,
                'company_id' => 1,
                'quantity' => 7,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 8',
                'price' => 600,
                'description' => 'Descripción del producto 8',
                'category_id' => 2,
                'company_id' => 2,
                'quantity' => 18,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 9',
                'price' => 350,
                'description' => 'Descripción del producto 9',
                'category_id' => 3,
                'company_id' => 3,
                'quantity' => 9,
                'image' => 'default.png',
            ],
            [
                'name' => 'Producto 10',
                'price' => 480,
                'description' => 'Descripción del producto 10',
                'category_id' => 1,
                'company_id' => 2,
                'quantity' => 11,
                'image' => 'default.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('carts')->insert([
                'users_iduser' => $i,
                'products_idproduct' => $i,
                'quantity' => rand(1, 5),
            ]);
        }
    }
}

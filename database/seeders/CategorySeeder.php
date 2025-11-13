<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => "Categoría $i",
                'description' => "Descripción de la categoría $i",
                'company_id' => rand(1, 10), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

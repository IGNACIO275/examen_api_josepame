<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Service::create([
        'name' => 'Servicio1',
        'price' => 104.00,
        'description' => 'Descripción del servicio 1',
        'category_id' => 1,
        'company_id' => 1,
        'image' => 'default.png',
     ]);

        }
    }
}

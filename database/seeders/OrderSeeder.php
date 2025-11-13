<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Order::create([
                'date' => now(),
                'name_customer' => 'Cliente ' . $i,
                'address' => 'Dirección ' . $i,
                'phone' => '555-000' . $i,
                'status' => ['Pendiente','Pagado','Cancelado'][array_rand(['Pendiente','Pagado','Cancelado'])],
                'quantity' => rand(1, 5),
                'product_id' => rand(1, 10),
                'service_id' => rand(1, 10),
                'company_id' => rand(1, 5),
                'user_id' => rand(1, 5),
            ]);
        }
    }
}



<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        // Asegúrate de tener al menos 10 registros en 'deliveries'
        for ($i = 1; $i <= 10; $i++) {
            Vehicle::create([
                'brand' => 'Marca' . $i,
                'model' => 'Modelo' . $i,
                'year' => '20' . rand(10, 25), 
                'plate' => 'ABC' . rand(100, 999),
                'type' => ['Camión', 'Furgoneta', 'Auto'][array_rand(['Camión','Furgoneta','Auto'])],
                'deliveries_id' => rand(1, 10), // Asegúrate de que existan registros en deliveries
            ]);
        }
    }
}


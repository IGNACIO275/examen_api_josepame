<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\delivery;

class DeliverySeeder extends Seeder
{
    public function run(): void
    {
        $estados = ['Pendiente', 'En ruta', 'Entregado'];
        for ($i = 1; $i <= 10; $i++) {
           Delivery::create([
         'user_id' => 1,
          'gender' => 'M',
          'birth_date' => '1990-01-01',
          'vehicle_type' => 'Auto',
          'dni_document_front' => 'dni_front.png',
          'dni_document_back' => 'dni_back.png',
          'driving_license' => 'license.png',
          'transit_license' => 'transit.png',
          'mandatory_insurance' => 'insurance.png',
          'profile_photo' => 'profile.png',
     ]);

        }
    }
}


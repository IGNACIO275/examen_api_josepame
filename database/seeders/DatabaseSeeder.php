<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Primero los seeders de tablas "padre"
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            CategorySeeder::class,
            DeliverySeeder::class, 
            
        ]);


        $this->call([
            ProductSeeder::class,
            ServiceSeeder::class,
        ]);

        
        $this->call([
            OrderSeeder::class,
            VehicleSeeder::class,
        ]);
    }
}

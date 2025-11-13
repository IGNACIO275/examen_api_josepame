<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('companieses')->insert([
                'company_name' => "Empresa $i",
                'nit' => "NIT000$i",
                'person_type' => $i % 2 == 0 ? 'Jurídica' : 'Natural',
                'legal_representative_name' => "RepresentanteNombre$i",
                'legal_representative_lastname' => "RepresentanteApellido$i",
                'legal_representative_email' => "rep$i@empresa.com",
                'user_id' => $i, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

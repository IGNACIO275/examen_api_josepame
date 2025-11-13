<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Admin', 'Cliente', 'Repartidor', 'Vendedor', 'Supervisor', 'Soporte', 'Contador', 'Gerente', 'Asistente', 'Invitado'];
        foreach ($roles as $role) {
            DB::table('roles')->insert(['name' => $role]);
        }
    }
}


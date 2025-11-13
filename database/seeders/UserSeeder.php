<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
           DB::table('users')->insert([
         'name' => "Usuario$i",
         'lastname' => "Apellido$i",
         'email' => "usuario$i@example.com",
         'country' => "País$i",
         'phone' => "30000000$i",
         'password' => bcrypt('123456'),
         'created_at' => now(),
         'updated_at' => now(),
     ]);
 
        }
    }
}


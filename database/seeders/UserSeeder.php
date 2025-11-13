<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'apellido' => 'Principal',
            'email' => 'admin@utn.com',
            'telefono' => '3420000000',
            'perfil' => 'Administrador',
            'password' => Hash::make('admin123'),
        ]);
    }
}

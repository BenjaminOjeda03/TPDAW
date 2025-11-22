<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@miapp.com'],
            [
                'nombre' => 'Admin',
                'apellido' => 'Principal',
                'nombre_usuario' => 'admin',
                'telefono' => '1234567890',
                'perfil' => 'Administrador',
                'password' => Hash::make('admin123'), // Cambia la contraseña si quieres
            ]
        );
    }
}

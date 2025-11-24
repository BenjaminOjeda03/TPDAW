<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Client;

class ClientPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->perfil, ['Administrador', 'Gestión', 'Consultas']);
    }

    public function view(User $user, Client $client)
    {
        return in_array($user->perfil, ['Administrador', 'Gestión', 'Consultas']);
    }

    public function create(User $user)
    {
        return $user->perfil === 'Administrador';
    }

    public function update(User $user, Client $client)
    {
        return $user->perfil === 'Administrador';
    }

    public function delete(User $user, Client $client)
    {
        return $user->perfil === 'Administrador';
    }
}

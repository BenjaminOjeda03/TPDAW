<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        // Solo el Administrador puede ver el listado
        return $user->perfil === 'Administrador';
    }

    public function view(User $user, User $model)
    {
        // Solo el Administrador puede ver un usuario en detalle
        return $user->perfil === 'Administrador';
    }

    public function create(User $user)
    {
        // Solo Administrador crea
        return $user->perfil === 'Administrador';
    }

    public function update(User $user, User $model)
    {
        // Solo Administrador edita
        return $user->perfil === 'Administrador';
    }

    public function delete(User $user, User $model)
    {
        // Solo Administrador elimina
        return $user->perfil === 'Administrador';
    }
}
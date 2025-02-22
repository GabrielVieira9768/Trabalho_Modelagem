<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function ehAdmin(User $user)
    {
        return $user->cargo;  // Se o cargo for verdadeiro, o usuário é admin
    }

    public function ehVoluntario(User $user)
    {
        return !$user->cargo;  // Se o cargo for falso, o usuário é voluntário
    }

}

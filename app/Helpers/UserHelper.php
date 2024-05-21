<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function convertRoleName(User $user)
    {
        switch ($user->role->name) {
            case 'admin':
                return 'Administrator';
            case 'hr':
                return 'Recursos Humanos';
            case 'user':
                return 'Usuário';
            case 'chef':
                return 'Chef';
            case 'taster':
                return 'Degustador';
            case 'publisher':
                return 'Publicador';
        }
    }
}

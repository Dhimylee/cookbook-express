<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    //Can view and edit users
    public function viewUsers(User $user)
    {
        return ($user->role->name === 'admin' || $user->role->name === 'hr');
    }
}

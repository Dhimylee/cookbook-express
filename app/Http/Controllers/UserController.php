<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    public function show()
    {
        $user = auth()->user();
        return view('user.show', compact('user'));
    }

    public function edit(Request $request)
    {
        $user = (new UserRepository)->find($request->id);
        $roles = (new RoleRepository)->all();
        return view('user.edit', compact('user', 'roles'));
    }

    public function update()
    {
        return view('user.update');
    }

    public function destroy()
    {
        return view('user.destroy');
    }
}

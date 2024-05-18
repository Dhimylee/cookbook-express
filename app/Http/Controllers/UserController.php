<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    public function show($userId)
    {
        $user = User::find($userId);
        return view('user.show', compact('user'));
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::find($request->userId);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        $user->save();
        return redirect()->route('user.edit', ['userId' => $user->id]);
    }

    public function destroy()
    {
        return view('user.destroy');
    }
}

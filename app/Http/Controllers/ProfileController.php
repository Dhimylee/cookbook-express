<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($userId)
    {
        $user = User::find($userId);
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        $restaurants = '';

        if($user->role->name == 'chef') {
            $restaurants = Restaurant::all();
        }

        return view('profile.edit', compact('user', 'restaurants'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->save();

        if ($request->password != null) {

            if(password_verify($request->oldPassword, $user->password)) {

                if($request->password == $request->password_confirmation){
                    $user->password = bcrypt($request->password);
                    $user->save();
                } else {
                    return back()->with('error','As senhas não conferem!');
                }

            } else {
                return back()->with('error','A senha antiga não confere!');
            }
        }

        return back()->with('success','Perfil atualizado com sucesso!');

    }
}

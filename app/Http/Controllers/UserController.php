<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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

            'rg' => 'required_unless:role_id,2',
            'admission_date' => 'required_unless:role_id,2',
            'demission_date' => 'nullable',
            'salary' => 'required_unless:role_id,2',
            'fantasy_name' => 'nullable',
        ]);

        $user = User::find($request->userId);
        $employeeId = $user->employee->id ?? null;
        $rgAlreadyRegistered = Employee::where('rg', $validated['rg'])
            ->when(isset($employeeId),function($q, $employeeId){
                $q->where('id', '!=', $employeeId);
            })
            ->first();

        if($rgAlreadyRegistered){
            return back()->with('error', 'O RG informado já está cadastrado!');
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];

        $user->save();

        if($user->role_id == 2){
            $employee = Employee::where('user_id', $user->id);
            $employee->delete();

        } else {

            $employee = Employee::where('user_id', $user->id)->first();

            if($employee){
                $employee->rg = $validated['rg'];
                $employee->admission_date = $validated['admission_date'];
                $employee->salary = $validated['salary'];

                $employee->demission_date = $validated['demission_date'];
                $employee->fantasy_name = $validated['fantasy_name'];

                $employee->save();
            } else {
                Employee::create([
                    'user_id' => $user->id,
                    'rg' => $validated['rg'],
                    'admission_date' => $validated['admission_date'],
                    'salary' => $validated['salary'],
                ]);
            }
        }

        return redirect()->route('user.edit', ['userId' => $user->id]);
    }

    public function destroy()
    {
        return view('user.destroy');
    }
}

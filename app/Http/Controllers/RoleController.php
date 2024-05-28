<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create([
            'name'=> $request->name
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $role = Role::find($request->id);
        $error = '';

        if($role->users->count() > 0){
            $error = 'Não é possível deletar o cargo '.$role->name.' pois existem usuários associados a ele.';
        } else {
            $role->delete();
        }

        return redirect()->back()->with('error', $error);
    }

    public function activate(Request $request)
    {
        $role = Role::find($request->id);
        $role->update([
            'active' => 1
        ]);

        return redirect()->back();
    }

    public function deactivate(Request $request)
    {
        $role = Role::find($request->id);
        $role->update([
            'active' => 0
        ]);

        return redirect()->back();
    }
}

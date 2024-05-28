<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Models\Employee_experience;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    /**
     * Add experience to employee.
     */
    public function addExperience(Request $request)
    {
        Employee_experience::create([
            'employee_id' => $request->employee_id,
            'restaurant_id' => $request->restaurant_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->back()->with('success','Experiência adicionada com sucesso!');
    }

    public function removeExperience(Request $request)
    {
        Employee_experience::find($request->id)->delete();

        return redirect()->back()->with('success','Experiência removida com sucesso!');
    }
}

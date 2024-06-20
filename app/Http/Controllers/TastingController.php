<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Tasting;
use Illuminate\Http\Request;

class TastingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tastings = Tasting::when($request->filter, function($query) use ($request){
            $query->where(function($query) use ($request){
                $query->whereHas('employee', function($query) use ($request){
                    $query->whereHas('user', function($query) use ($request){
                        $query->where('name', 'like', '%'.$request->filter.'%');
                    });
                });
            })
            ->orWhere(function($query) use ($request){
                $query->whereHas('recipe', function($query) use ($request){
                    $query->where('name', 'like', '%'.$request->filter.'%');
                });
            });
        })->get();

        $recipes = Recipe::all();

        return view('tasting.index', compact('tastings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipes = Recipe::all();
        return view('tasting.create', compact('recipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'employee_id' => 'required|integer',
            'recipe_id' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $alreadyTasted = Tasting::where('employee_id', $request->employee_id)->where('recipe_id', $request->recipe_id)->first();
        if(isset($alreadyTasted)){
            return redirect()->route('tasting.create')->with('error','Você já degustou essa receita!');
        }

        Tasting::create($request->all());

        return redirect()->route('tasting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasting $tasting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasting = Tasting::find($id);

        if($tasting->employee->user->id != auth()->id()){
            return redirect()->route('tasting.index')->with('error', 'Você só pode editar degustações realizadas por você!');
        }

        $recipes = Recipe::all();

        return view('tasting.edit', compact('tasting', 'recipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'date' => 'required|date',
            'employee_id' => 'required|integer',
            'recipe_id' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        $tasting = Tasting::find($request->id);

        if($tasting->employee->user->id != auth()->id()){
            return redirect()->route('tasting.index')->with('error', 'Você só pode editar degustações realizadas por você!');
        }

        $tasting->update($request->all());

        return redirect()->route('tasting.index')->with('success', 'Degustação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tasting = Tasting::find($id);

        if($tasting->employee->user->id != auth()->id()){
            return redirect()->route('tasting.index')->with('error', 'Você só pode excluir degustações realizadas por você!');
        }

        $tasting->delete();

        return redirect()->route('tasting.index')->with('success', 'Degustação excluída com sucesso!');
    }
}

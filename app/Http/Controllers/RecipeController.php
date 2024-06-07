<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Measure;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('recipe.index', ['recipes' => Recipe::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        $categories = Category::all();
        $measures = Measure::all();

        return view ('recipe.create', compact('ingredients', 'categories', 'measures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|array',
            'ingredients.*' => 'required|interger',
            'employee' => 'required|interger',
            'portions' => 'required|interger',
            'category' => 'required|interger',
        ]);

        $recipe = Recipe::create([
            'name'=> $request->name,
            'employee_id' => $request->employee,
            'creation_date' => today(),
            'portions' => $request->portions,
            'category_id' => $request->category,
            'published' => false,
        ]);

        foreach($request->ingredients as $ingredientId) {
            $ingredient = Recipe::find($ingredientId);
            $recipe->ingredients()->attach($ingredient);
        }

        return redirect()->route('recipe.index')->with('success','Receita cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}

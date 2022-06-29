<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy("created_at", "DESC")->paginate(3);
        
        return view('recipes.index', [
            "recipes" => $recipes
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', [
            "recipe" => $recipe
        ]);
    }

    public function comment($id, CommentForm $request)
    {
        $recipe = Recipe::findOrFail($id);

        $recipe->comments()->create($request->validated());

        return redirect(route("recipes.show", $id));

    }
}

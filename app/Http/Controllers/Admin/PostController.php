<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecipeFormRequest;
use App\Models\Recipe;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy("created_at", "DESC")->paginate(10);
        return view('admin.posts.index', [
            "recipes" => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecipeFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeFormRequest $request)
    {
        $recipe = Recipe::create($request->validated());

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('admin.posts.create', [
            "recipe" => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RecipeFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeFormRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $data = $request->validated();

        if($request->has("thumbnail")) {
            $thumbnail = str_replace("public/recipes", "", $request->file("thumbnail")->store("public/recipes"));
            $data["thumbnail"] = $thumbnail;
        }

        $recipe->update($data);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::destroy($id);

        return redirect(route('admin.posts.index'));
    }
}

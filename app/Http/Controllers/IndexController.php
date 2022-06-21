<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy("created_at", "DESC")->limit(3)->get();
        
        return view('welcome', [
            "recipes" => $recipes
        ]);
    }
}

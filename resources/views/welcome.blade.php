@extends('layouts.app')

@section('title', 'Main')

@section('content')
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($recipes as $recipe)
            @include("recipes.onerecipe", ["recipe" => $recipe]) 
        @endforeach
    </div>

    
@endsection
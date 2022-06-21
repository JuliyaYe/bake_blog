<div class="m-auto px-4 py-8 max-w-xl">
    <div class="bg-white shadow-2xl" >
                <!-- <div>
                    <img src="{{ $recipe->thumbnail }}">
                </div> -->
        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800"> 
                <a href="{{ route('recipes.show', $recipe->id)}}" class="text-base font-medium text-gray-500 hover:text-gray-900">{{ $recipe->title }}</a>
            </h2>
            <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                {!! $recipe->preview !!}
            </p>
            <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                {!! $recipe->created_at !!}
            </p>
        </div>
    </div>
</div>
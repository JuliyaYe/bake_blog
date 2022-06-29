<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0 inner">

        <a href="{{ route('home') }}" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Bake blog</a><br>
        <span class="text-xs text-grey-dark">Learn to code and bake</span>

        
        <!-- <a href="/recipes" class="text-base font-medium text-gray-500 hover:text-gray-900">Recipes</a> -->
          

    </div>

    <div>
        <a href="{{ route('recipes.index') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Recipes</a>
    </div>

    <div>
        <a href="{{ route('contacts') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">Contacts</a>
    </div>
        

    <div class="sm:mb-0 self-center">
        @auth("web")
            <a href="{{ route('logout') }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Выйти</a>
        @endauth

        @guest("web")
            <a href="{{ route('login') }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Войти</a>
        @endguest
    </div>
</nav>
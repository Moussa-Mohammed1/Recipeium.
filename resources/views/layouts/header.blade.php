<header class="sticky top-0 z-50 w-full bg-white/90 dark:bg-[#2c2015]/90 backdrop-blur-xl border-b border-[#f5f2f0] dark:border-[#3e2f24] shadow-sm transition-colors duration-300">
    <div class="max-w-[1280px] mx-auto px-4 md:px-8 py-4 flex items-center justify-between">
        
        <a class="flex items-center gap-3 group focus:outline-none" href="/recipes">
            <div class="relative flex items-center justify-center size-10 rounded-xl bg-primary/10 dark:bg-primary/20 text-primary group-hover:bg-primary group-hover:text-white transition-all duration-300 ease-in-out">
                <img src="https://i.pinimg.com/1200x/9a/37/ca/9a37cad44ebba99a1f03b9c3de77b380.jpg" class="rounded-lg">
            </div>
            <div class="flex flex-col">
                <h2 class="text-xl font-bold leading-none tracking-tight text-text-main dark:text-white">Recipeium</h2>
                <span class="text-[10px] font-medium tracking-wider uppercase text-text-secondary-light dark:text-text-secondary-dark opacity-70">let me cook</span>
            </div>
        </a>

        <nav class="hidden md:flex items-center justify-center gap-8 text-sm font-semibold text-text-secondary-light dark:text-text-secondary-dark">
            <a class="relative py-1 hover:text-primary dark:hover:text-primary transition-colors duration-200 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all after:duration-300 hover:after:w-full" 
               href="/recipes">
               Discover
            </a>
            <a class="relative py-1 hover:text-primary dark:hover:text-primary transition-colors duration-200 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all after:duration-300 hover:after:w-full" 
               href="/popular">
               Popular
            </a>
            <a class="relative py-1 hover:text-primary dark:hover:text-primary transition-colors duration-200 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-primary after:transition-all after:duration-300 hover:after:w-full" 
               href="/recipes/create">
               Create
            </a>
        </nav>

        <div class="flex items-center gap-5">
            <a href="/profile" class="group relative">
                <div class="size-10 rounded-full bg-cover bg-center border border-gray-200 dark:border-gray-700 shadow-inner ring-2 ring-transparent group-hover:ring-primary/50 group-hover:scale-105 transition-all duration-300"
                     style="background-image: url('{{ Auth::user()->image ?? 'https://i.pinimg.com/1200x/fd/f2/83/fdf2830d35dafef605cb8ccdba6d6cfc.jpg' }}');">
                </div>
                <span class="absolute bottom-0 right-0 block size-2.5 bg-green-500 border-2 border-white dark:border-[#2c2015] rounded-full"></span>
            </a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit" 
                        class="px-5 py-2 bg-primary text-white text-sm font-bold rounded-full shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:bg-primary-hover active:scale-95 transition-all duration-300">
                    Logout
                </button>
            </form>
            
            <button class="md:hidden text-text-main dark:text-white p-1">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>

    </div>
</header>
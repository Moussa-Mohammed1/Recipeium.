<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Recipeium - Discover &amp; Share Recipes</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f48c25",
                        "secondary": "#e63946", // Tomato red for accents
                        "background-light": "#fdfbf7", // Creamier off-white
                        "background-dark": "#1a1510",
                        "surface-light": "#ffffff",
                        "surface-dark": "#2d241c",
                        'recipe-light': '#F9F7F2', // Warm paper/cream
                        'recipe-dark': '#0F0905',
                          // Deep espresso
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Plus Jakarta Sans", "sans-serif"],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(24, 20, 17, 0.05)',
                        'hover': '0 10px 25px -5px rgba(24, 20, 17, 0.1)',
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .material-symbols-outlined.filled {
            font-variation-settings: 'FILL' 1;
        }

        /* Custom scrollbar for horizontal chips if needed */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body
    class="bg-recipe-light dark:bg-background-dark text-[#181411] dark:text-[#f5f2f0] transition-colors duration-300">

    @include('layouts.header')
    <!-- Main Content Wrapper -->
     
    <main class="w-full flex flex-col items-center">
        <!-- Hero Section -->
        <div class="w-full relative h-[500px] md:h-[600px] overflow-hidden flex items-center justify-center">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 bg-cover bg-center z-0"
                data-alt="Top down view of a rustic table filled with fresh colorful ingredients and dishes"
                style="background-image: url('https://i.pinimg.com/1200x/e2/27/6c/e2276c48e1b36ba7dc91004987d908cc.jpg');">
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/60 z-10"></div>

            <div class="relative z-20 text-center px-4 max-w-4xl flex flex-col items-center gap-6 mt-10">

                <h1 class="text-5xl md:text-7xl font-black text-white leading-tight tracking-tight drop-shadow-sm">
                    Cook. Share. <span class="text-primary">Inspire.</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 font-medium max-w-2xl drop-shadow-sm">
                    Discover mouth-watering recipes from home cooks and chefs around the world. What will you create
                    today?
                </p>
                <!-- Search Bar Integrated in Hero -->
                <div class="w-full max-w-2xl mt-4">
                    <form
                        method="POST"
                        action="/recipes/search"
                        class="flex w-full items-center p-2 bg-white rounded-full shadow-2xl shadow-black/20 focus-within:ring-4 focus-within:ring-primary/30 transition-all gap-2">
                        @csrf
                        <div class="pl-4 text-gray-400">
                            <span class="material-symbols-outlined">search</span>
                        </div>
                        <input
                            name="recipe"
                            class="flex-1 border-none outline-none focus:ring-0 text-gray-800 placeholder-gray-400 bg-transparent h-12 px-4 text-base rounded-none"
                            placeholder="Search recipes, ingredients, or chefs..." type="text"
                            value="{{ old('recipe', $searchTerm ?? '') }}" />
                        <select name="category" class="h-12 px-4 rounded-lg border-2 border-gray-200 focus:border-primary focus:ring-0 text-gray-800 bg-white dark:bg-surface-dark text-base">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category', $selectedCategory ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                        <button
                            type="submit"
                            class="bg-primary hover:bg-orange-600 text-white rounded-full size-12 flex items-center justify-center transition-colors">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Masonry Grid Content -->
        <section class="w-full max-w-[1280px] px-4 md:px-8 py-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-[#181411] dark:text-white">Fresh from the Kitchen</h2>
                <a class="text-primary font-bold text-sm hover:underline flex items-center gap-1" href="#">
                    View All <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </div>
            <!-- Stylish total recipes count -->
            <div class="flex items-center justify-center mb-8">
                <span class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-primary/10 dark:bg-primary/20 text-primary dark:text-orange-300 font-semibold text-lg shadow-soft">
                    <span class="material-symbols-outlined text-[22px]">restaurant_menu</span>
                    {{ $recipes->count() }} Published Recipes
                </span>
            </div>
            @if ($recipes->count())
                <!-- Masonry Layout using Columns -->
                <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6">
                    @foreach($recipes as $recipe)
                        <div onclick="window.location='{{ route('recipes.show', $recipe->id) }}'"
                            class="break-inside-avoid relative group rounded-2xl bg-white dark:bg-surface-dark shadow-soft hover:shadow-hover transition-all duration-300 cursor-pointer overflow-hidden ring-1 ring-black/5 dark:ring-white/5">
                            <div class="relative w-full overflow-hidden">
                                <img class="w-full h-[200px] object-cover group-hover:scale-105 transition-transform duration-500"
                                    data-alt="Healthy bowl with avocado, greens, eggs and seeds"
                                    src="{{ asset('storage/' . $recipe->image) }}" />
                                <div
                                    class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur-sm px-2.5 py-1 rounded-md text-xs font-bold text-[#181411] dark:text-white uppercase tracking-wide">
                                    {{ $recipe->category->title }}
                                </div>

                            </div>
                            <div class="p-4">
                                <h3
                                    class="text-lg font-bold text-[#181411] dark:text-white mb-1 leading-snug group-hover:text-primary transition-colors">
                                    {{ $recipe->title }}
                                </h3>

                                <div
                                    class="flex items-center justify-between border-t border-gray-100 dark:border-white/5 pt-3 mt-2">
                                    <div class="flex items-center gap-2">
                                        <img class="size-6 rounded-full object-cover" data-alt="Portrait of Sarah Bakes"
                                            src="{{ $recipe->user->image ?? 'https://i.pinimg.com/736x/cc/9a/21/cc9a217851caac8b48adb7917e4c890c.jpg' }}" />
                                        <span
                                            class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $recipe->user->name ?? 'nn' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-400 text-xs">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        {{ $recipe->created_at->diffForHumans()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col h-full items-center justify-center">
                    <div class="flex flex-col flex-1 items-center justify-center w-full">
                        <div class="mb-6 drop-shadow-xl">
                            <span
                                class="material-symbols-outlined text-[80px] text-primary/30 dark:text-primary/40">restaurant</span>
                        </div>
                        <h3 class="text-3xl font-extrabold text-gray-800 dark:text-white mb-3 tracking-tight text-center">No
                            recipes yet!</h3>
                        <p class="text-lg text-gray-500 dark:text-gray-400 mb-8 text-center max-w-md">It looks a little
                            empty here.<br>Be the first to inspire others by sharing your favorite dish!</p>
                    </div>
                    <div class="w-full flex justify-center mt-auto pb-2">
                        <a href="/recipes/create"
                            class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-primary to-orange-400 text-white font-extrabold shadow-2xl hover:from-orange-500 hover:to-primary transition-all text-xl focus:outline-none focus:ring-4 focus:ring-primary/30">
                            <span class="material-symbols-outlined text-[28px]">add_circle</span>
                            Start by adding one
                        </a>
                    </div>
                </div>
            @endif
        </section>
        <!-- Newsletter Section -->
        <section class="w-full bg-[#fcece0] dark:bg-[#33261d] py-16 px-4">
            <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-10">
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-3xl font-black text-[#181411] dark:text-white mb-3">Don't Miss a Recipe!</h2>
                    <p class="text-gray-700 dark:text-gray-300">Join our weekly newsletter for the best recipes, cooking
                        tips, and exclusive chef interviews delivered to your inbox.</p>
                </div>
                <div class="flex-1 w-full">
                    <form class="flex flex-col sm:flex-row gap-3">
                        <input
                            class="flex-1 h-12 px-5 rounded-lg border-2 border-transparent focus:border-primary focus:ring-0 text-[#181411] placeholder-gray-400 outline-none bg-white dark:bg-surface-dark"
                            placeholder="Your email address" type="email" />
                        <button
                            class="h-12 px-8 rounded-lg bg-primary hover:bg-orange-600 text-white font-bold transition-all shadow-lg shadow-primary/20"
                            type="button">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-white dark:bg-surface-dark py-8 border-t border-[#f0ebe6] dark:border-[#3a2e26]">
        <div class="max-w-[1280px] mx-auto px-4 md:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <div class="size-6 rounded bg-primary flex items-center justify-center text-white">
                    <span class="material-symbols-outlined text-[16px] font-bold">restaurant_menu</span>
                </div>
                <p class="text-sm font-bold text-[#181411] dark:text-white">Recipeium</p>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                © 2024 Recipeium. All rights reserved. Taste the world.
            </div>
            <div class="flex gap-4">
                <a class="text-gray-400 hover:text-primary transition-colors" href="#">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z">
                        </path>
                    </svg>
                </a>
                <a class="text-gray-400 hover:text-primary transition-colors" href="#">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-5 w-5" fill="currentColor" viewbox="0 0 24 24">
                        <path
                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
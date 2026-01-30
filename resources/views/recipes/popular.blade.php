<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Recipeium - Recipe Categories Explorer</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;family=Noto+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f48c25",
                        "background-light": "#f8f7f5",
                        "background-dark": "#221910",
                        "text-main": "#181411",
                        "text-light": "#8a7560",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        /* Custom scrollbar for cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark min-h-screen flex flex-col font-display antialiased transition-colors duration-200">
    <!-- Top Navigation -->
    @include('layouts.header')
    <!-- Main Content -->
    <main class="flex-grow w-full max-w-[1280px] mx-auto px-4 md:px-10 py-8">
        <!-- Page Heading & Subheading -->
        <div class="flex flex-col gap-2 mb-8 animate-fade-in-up">
            <h1 class="text-text-main dark:text-white text-4xl md:text-5xl font-black leading-tight tracking-[-0.02em]">
                Explore Culinary Worlds
            </h1>
            <p class="text-text-light text-lg font-medium max-w-2xl">
                Discover new tastes and inspiration for your next meal. From quick bites to gourmet feasts.
            </p>
        </div>
        <!-- Popular Recipes Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($recipes as $recipe)
                <a class="group relative flex flex-col h-full bg-white dark:bg-[#2c2015] rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:shadow-primary/10 transition-all duration-300 border border-transparent hover:border-primary/20"
                    href="{{ route('recipes.show', $recipe->id) }}">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-60"></div>
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                            data-alt="{{ $recipe->title }}"
                            style="background-image: url('{{ asset('storage/'.$recipe->image) }}');">
                        </div>
                        <div class="absolute bottom-3 left-3 z-20">
                            <span class="material-symbols-outlined text-white text-3xl drop-shadow-md">restaurant_menu</span>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-text-main dark:text-white text-xl font-bold group-hover:text-primary transition-colors">
                                {{ $recipe->title }}
                            </h3>
                        </div>
                        <p class="text-text-light text-sm line-clamp-2 mb-4">{{ $recipe->description }}</p>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-md bg-primary/10 text-primary">
                                {{ $recipe->comments_count }} Comments
                            </span>
                            <div class="size-8 rounded-full bg-[#f5f2f0] dark:bg-[#3e2f24] flex items-center justify-center text-text-main dark:text-white group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-4 text-center text-text-light py-12">No popular recipes found.</div>
            @endforelse
        </div>
        
    </main>
    <!-- Footer -->
    <footer class="bg-white dark:bg-[#2c2015] border-t border-[#f5f2f0] dark:border-[#3e2f24] py-12 mt-auto">
        <div class="max-w-[1280px] mx-auto px-4 md:px-10 flex flex-col gap-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex flex-col items-center md:items-start gap-2">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary text-3xl">lunch_dining</span>
                        <span class="text-xl font-bold text-text-main dark:text-white">Recipeium</span>
                    </div>
                    <p class="text-text-light text-sm max-w-xs text-center md:text-left">Cook, share, and inspire. Join
                        our community of food lovers today.</p>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-8">
                    <a class="text-text-light hover:text-primary text-sm font-medium transition-colors" href="#">About
                        Us</a>
                    <a class="text-text-light hover:text-primary text-sm font-medium transition-colors"
                        href="#">Community Guidelines</a>
                    <a class="text-text-light hover:text-primary text-sm font-medium transition-colors" href="#">Privacy
                        Policy</a>
                    <a class="text-text-light hover:text-primary text-sm font-medium transition-colors" href="#">Contact
                        Support</a>
                </div>
            </div>
            <div class="w-full h-px bg-[#f5f2f0] dark:bg-[#3e2f24]"></div>
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-text-light text-sm text-center md:text-left">© 2023 Recipeium. All rights reserved.</p>
                <div class="flex gap-4">
                    <a class="size-10 rounded-full bg-[#f8f7f5] dark:bg-[#3e2f24] flex items-center justify-center text-text-light hover:bg-primary hover:text-white transition-all"
                        href="#">
                        <span class="material-symbols-outlined text-xl">photo_camera</span>
                    </a>
                    <a class="size-10 rounded-full bg-[#f8f7f5] dark:bg-[#3e2f24] flex items-center justify-center text-text-light hover:bg-primary hover:text-white transition-all"
                        href="#">
                        <span class="material-symbols-outlined text-xl">flutter_dash</span>
                    </a>
                    <a class="size-10 rounded-full bg-[#f8f7f5] dark:bg-[#3e2f24] flex items-center justify-center text-text-light hover:bg-primary hover:text-white transition-all"
                        href="#">
                        <span class="material-symbols-outlined text-xl">thumb_up</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
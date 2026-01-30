<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Chef Profile Dashboard - Recipeium</title>
    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS with Plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#f48c25",
                        "background-light": "#f8f7f5",
                        "background-dark": "#221910",
                        "card-light": "#ffffff",
                        "card-dark": "#2C251F",
                        "text-main": "#181411",
                        "text-muted": "#8a7560",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Custom scrollbar for cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 20px;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-text-main dark:text-gray-100 min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    @include('layouts.header')
    <!-- Main Content -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 py-8 md:px-10">
        <!-- Profile Header Section -->
        <section class="mb-8">
            <div
                class="bg-card-light dark:bg-card-dark rounded-2xl p-6 shadow-sm border border-[#e6e0db] dark:border-[#3a322a] flex flex-col md:flex-row gap-6 items-center md:items-start">
                <div class="relative shrink-0">
                    <div
                        class="size-32 md:size-40 rounded-full bg-gray-200 ring-4 ring-white dark:ring-[#3a322a] shadow-md overflow-hidden">
                        <div class="w-full h-full bg-center bg-cover" data-alt="Large profile picture of Julian Pepper"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBJzV9--JQiEF5v4_VrhBLt0xH9-LEYyz3fzK9-KbRGOHS_1s6ku5QAJ4PaKoK9jgiJ-IxbZBALykrn2uWnC7Zt5ApTvc2Q_a5R_BSKtQuwFEjMXD0trwxgACYq_nnp3wHfeEuMzkhCvwxNMcg2VfKIW0SEBqiTK0GgJB6R3yVuMum6GwmN_XAeuSGqPnLop-N2KqqLCQmOtp0c_LXpkhj5OZ0ISxsOGFQfylTejgwLd2JcEMu69gtIF2n7O-8Tx5qGKYWRRVGoWZ5O");'>
                        </div>
                    </div>
                    <div
                        class="absolute bottom-1 right-1 bg-primary text-white p-1.5 rounded-full border-2 border-white dark:border-[#3a322a] flex items-center justify-center shadow-sm">
                        <span class="material-symbols-outlined text-[20px]">verified</span>
                    </div>
                </div>
                <div class="flex flex-col flex-1 text-center md:text-left pt-2">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h1 class="text-3xl font-bold text-text-main dark:text-white mb-1">{{Auth::user()->name}}</h1>
                            <p class="text-primary font-medium mb-3">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="flex gap-3 justify-center md:justify-end">
                            <button
                                class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-text-main dark:text-gray-200 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-[#3a322a] transition-colors">Edit
                                Profile</button>
                            <button
                                class="size-9 flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 text-text-main dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-[#3a322a] transition-colors">
                                <span class="material-symbols-outlined text-[20px]">share</span>
                            </button>
                        </div>
                    </div>
                    <p class="text-text-muted dark:text-gray-400 max-w-2xl mt-2 leading-relaxed">
                        Home cook obsessed with perfect pasta and spicy salsas. Sharing my weekend experiments and
                        family classics. Let's make something delicious together! 🍝🌶️
                    </p>
                    <!-- Stats Inline for Mobile/Tablet, or keep separate below? Design asked for separate below, but let's integrate small badges here too or stick to the requested layout. Sticking to requested layout below. -->
                </div>
            </div>
        </section>
        <!-- Stats Section -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
            <div
                class="bg-card-light dark:bg-card-dark p-6 rounded-xl border border-[#e6e0db] dark:border-[#3a322a] shadow-sm flex items-center gap-5 hover:shadow-md transition-shadow cursor-default">
                <div
                    class="size-14 rounded-full bg-orange-100 dark:bg-orange-900/30 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-3xl">menu_book</span>
                </div>
                <div>
                    <p class="text-text-muted dark:text-gray-400 text-sm font-medium uppercase tracking-wide">Recipes
                        Published</p>
                    <p class="text-3xl font-bold text-text-main dark:text-white">24</p>
                </div>
            </div>
            <div
                class="bg-card-light dark:bg-card-dark p-6 rounded-xl border border-[#e6e0db] dark:border-[#3a322a] shadow-sm flex items-center gap-5 hover:shadow-md transition-shadow cursor-default">
                <div
                    class="size-14 rounded-full bg-orange-100 dark:bg-orange-900/30 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-3xl">chat_bubble</span>
                </div>
                <div>
                    <p class="text-text-muted dark:text-gray-400 text-sm font-medium uppercase tracking-wide">Comments
                        Received</p>
                    <p class="text-3xl font-bold text-text-main dark:text-white">1,208</p>
                </div>
            </div>
        </section>
        <!-- Recipe Content Header & Filters -->
        <div class="flex flex-col md:flex-row items-end md:items-center justify-between gap-4 mb-6">
            <h2 class="text-2xl font-bold text-text-main dark:text-white self-start">My Recipes</h2>
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                <!-- Search within recipes -->
                <div class="relative w-full sm:w-64">
                    <input
                        class="w-full h-10 pl-10 pr-4 rounded-lg bg-white dark:bg-card-dark border border-gray-200 dark:border-[#3a322a] text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:text-white dark:placeholder-gray-500"
                        placeholder="Search your recipes..." type="text" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[18px]">search</span>
                    </div>
                </div>
                <!-- Sort Dropdown -->
                <div class="relative w-full sm:w-auto">
                    <select
                        class="w-full h-10 pl-3 pr-8 rounded-lg bg-white dark:bg-card-dark border border-gray-200 dark:border-[#3a322a] text-sm text-text-main dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none cursor-pointer">
                        <option>Newest First</option>
                        <option>Oldest First</option>
                        <option>Most Popular</option>
                        <option>Highest Rated</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-text-muted">
                        <span class="material-symbols-outlined text-[20px]">expand_more</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recipe Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <article
                class="group bg-card-light dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-[#e6e0db] dark:border-[#3a322a] flex flex-col h-full">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Plate of spicy basil Thai chicken with rice"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCwbu9sGo1WOMwN61RnNZ_NHgjf4o6k9-9oeXCU55Nx4Ml0bC0HSRyVJYS73rsLounKSY2xTTSH7d3zPJCBH6UOVrV1a0OZb1RaT_6aBn0o8n3Zasrnvjs-DL8FSoXFLNblgOOtC3KJWn3-gySIoWFbdyhR3YVNYJeYgJ0SgezCL7Gd-qyqKP2KPL20Auwb0pMAwQcx5qmF7Vk1qA7VS07YfhMfspdZllktO1Z68_H7AwjZUDtcBwzn62KDz5urbvlFASSrqjkmVYqN");'>
                    </div>
                    <div
                        class="absolute top-3 left-3 bg-white/90 dark:bg-black/70 backdrop-blur-sm px-2 py-1 rounded-md text-xs font-bold text-text-main dark:text-white shadow-sm">
                        Dinner
                    </div>
                    <div
                        class="absolute top-3 right-3 bg-primary text-white p-1.5 rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                        <span class="material-symbols-outlined text-[16px] block">visibility</span>
                    </div>
                </div>
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3
                            class="text-lg font-bold text-text-main dark:text-white leading-tight line-clamp-1 group-hover:text-primary transition-colors">
                            Spicy Basil Thai Chicken</h3>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-text-muted dark:text-gray-400 mb-4 font-medium">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span>20 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bar_chart</span>
                            <span>Easy</span>
                        </div>
                        <div class="flex items-center gap-1 ml-auto">
                            <span class="material-symbols-outlined text-[16px] text-primary">star</span>
                            <span class="text-text-main dark:text-gray-200">4.8</span>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-[#f5f2f0] dark:border-[#3a322a] flex gap-2">
                        <button
                            class="flex-1 flex items-center justify-center gap-2 h-9 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-sm font-semibold transition-colors">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                            Edit
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-red-100 hover:bg-red-50 text-red-500 dark:border-red-900/30 dark:hover:bg-red-900/20 transition-colors"
                            title="Delete Recipe">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </article>
            <!-- Card 2 -->
            <article
                class="group bg-card-light dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-[#e6e0db] dark:border-[#3a322a] flex flex-col h-full">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Classic sunday pot roast with vegetables"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDIj7QdUfOhi8io7jFu0Xs7aRG87ZFBnWqbwgqmaljFgsYWkSwxP5ZUdReBwMGjmV8mn8vJb4VRE_CdTKFjKBFUhlIjNM2SHeofg-2oYMBZ0FvKfve3ZC0kjRxzelp0o2N3GzoftBfZa-2pbfqS_Mk5nG8JTyHxbI04iXdVmYzSzyMBN1RzNIOYx1Vro-6xIgegCLEocnY2g8wuWQuuGpWSNYx8QdJhuCNzXh08njrM_07qBuIpkNe77Jq-1cOT12vCrpObncptO8c1");'>
                    </div>
                    <div
                        class="absolute top-3 left-3 bg-white/90 dark:bg-black/70 backdrop-blur-sm px-2 py-1 rounded-md text-xs font-bold text-text-main dark:text-white shadow-sm">
                        Main Course
                    </div>
                    <div
                        class="absolute top-3 right-3 bg-primary text-white p-1.5 rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                        <span class="material-symbols-outlined text-[16px] block">visibility</span>
                    </div>
                </div>
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3
                            class="text-lg font-bold text-text-main dark:text-white leading-tight line-clamp-1 group-hover:text-primary transition-colors">
                            Classic Sunday Pot Roast</h3>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-text-muted dark:text-gray-400 mb-4 font-medium">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span>3 hrs</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bar_chart</span>
                            <span>Medium</span>
                        </div>
                        <div class="flex items-center gap-1 ml-auto">
                            <span class="material-symbols-outlined text-[16px] text-primary">star</span>
                            <span class="text-text-main dark:text-gray-200">4.9</span>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-[#f5f2f0] dark:border-[#3a322a] flex gap-2">
                        <button
                            class="flex-1 flex items-center justify-center gap-2 h-9 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-sm font-semibold transition-colors">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                            Edit
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-red-100 hover:bg-red-50 text-red-500 dark:border-red-900/30 dark:hover:bg-red-900/20 transition-colors"
                            title="Delete Recipe">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </article>
            <!-- Card 3 -->
            <article
                class="group bg-card-light dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-[#e6e0db] dark:border-[#3a322a] flex flex-col h-full">
                <div class="relative aspect-[4/3] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Stack of fluffy lemon ricotta pancakes"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBWwXvHFPyQlpRkrC0j0iDs5G0VE2IWBiDq5qTPCcg1A2P3_C0YHFFP9VPYAQ1lMsuQ_bIceKWY-1EIDJS8zcawepFxBEjlMpziBf_t1RhtfffmhHSmKepW9k8FSVoufDPTkvqlzMvhHrMIQYP1eVxU2p3g6L8rHlhfziwbRcTftFSysxQ6J9kKr2u5ZXqDIpp6TybZmtwczJeNGkyCHJmgAlNjndyz-LZyW6l2N0qVwNHPLrDNkD6Hfl1K0Pz3oVHbsYYYdFUPbgHS");'>
                    </div>
                    <div
                        class="absolute top-3 left-3 bg-white/90 dark:bg-black/70 backdrop-blur-sm px-2 py-1 rounded-md text-xs font-bold text-text-main dark:text-white shadow-sm">
                        Breakfast
                    </div>
                    <div
                        class="absolute top-3 right-3 bg-primary text-white p-1.5 rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                        <span class="material-symbols-outlined text-[16px] block">visibility</span>
                    </div>
                </div>
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3
                            class="text-lg font-bold text-text-main dark:text-white leading-tight line-clamp-1 group-hover:text-primary transition-colors">
                            Lemon Ricotta Pancakes</h3>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-text-muted dark:text-gray-400 mb-4 font-medium">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span>30 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bar_chart</span>
                            <span>Easy</span>
                        </div>
                        <div class="flex items-center gap-1 ml-auto">
                            <span class="material-symbols-outlined text-[16px] text-primary">star</span>
                            <span class="text-text-main dark:text-gray-200">5.0</span>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-[#f5f2f0] dark:border-[#3a322a] flex gap-2">
                        <button
                            class="flex-1 flex items-center justify-center gap-2 h-9 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-sm font-semibold transition-colors">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                            Edit
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-red-100 hover:bg-red-50 text-red-500 dark:border-red-900/30 dark:hover:bg-red-900/20 transition-colors"
                            title="Delete Recipe">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </article>
            <!-- Card 4 -->
            <article
                class="group bg-card-light dark:bg-card-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-[#e6e0db] dark:border-[#3a322a] flex flex-col h-full">
                <div class="relative aspect-[4/3] overflow-hidden">

                    <div class="w-full h-full bg-center bg-cover transition-transform duration-500 group-hover:scale-105"
                        data-alt="Grilled salmon with fresh avocado salsa"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAKKFmrl51RYmfLI2_tqmrx2I0DdDkloTxhUebF9Nq9wdfERcBwQXkHOa0Hu7mudAKvZCZOZFIypRZP1ubKtwLYLXqQJSfI8V2nar67XLnmtcE74S10oH4G6XrIdglsVu21QyokCFESWZCBkHy-B9__8mnIAIAJ82H5BMVCbedhI_tMWXSYSjvwF65RiCllQwzsRETyIcxiJOfB7bqar242A-toSK_lm_qvk-LnH7IIPAxhLGcPmMDa4c4RcGEnNA13oViLy8Gck6IJ");'>
                    </div>
                    <div
                        class="absolute top-3 left-3 bg-white/90 dark:bg-black/70 backdrop-blur-sm px-2 py-1 rounded-md text-xs font-bold text-text-main dark:text-white shadow-sm">
                        Seafood
                    </div>
                    <div
                        class="absolute top-3 right-3 bg-primary text-white p-1.5 rounded-full shadow-md opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">
                        <span class="material-symbols-outlined text-[16px] block">visibility</span>
                    </div>
                </div>
                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3
                            class="text-lg font-bold text-text-main dark:text-white leading-tight line-clamp-1 group-hover:text-primary transition-colors">
                            Grilled Salmon &amp; Avo</h3>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-text-muted dark:text-gray-400 mb-4 font-medium">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span>25 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">bar_chart</span>
                            <span>Medium</span>
                        </div>
                        <div class="flex items-center gap-1 ml-auto">
                            <span
                                class="material-symbols-outlined text-[16px] text-gray-300 dark:text-gray-600">star</span>
                            <span class="text-text-muted dark:text-gray-400">New</span>
                        </div>
                    </div>
                    <div class="mt-auto pt-4 border-t border-[#f5f2f0] dark:border-[#3a322a] flex gap-2">
                        <button
                            class="flex-1 flex items-center justify-center gap-2 h-9 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-sm font-semibold transition-colors">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                            Edit
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-red-100 hover:bg-red-50 text-red-500 dark:border-red-900/30 dark:hover:bg-red-900/20 transition-colors"
                            title="Delete Recipe">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </article>
            <!-- Add New Card (Empty State hint) -->
            <article
                class="group bg-[#f5f2f0] dark:bg-[#2C251F]/50 rounded-2xl overflow-hidden border-2 border-dashed border-gray-300 dark:border-[#3a322a] flex flex-col items-center justify-center h-full min-h-[300px] cursor-pointer hover:border-primary hover:bg-primary/5 transition-all">
                <div
                    class="size-16 rounded-full bg-white dark:bg-[#3a322a] flex items-center justify-center text-primary mb-4 shadow-sm group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-4xl">add</span>
                </div>
                <h3 class="text-lg font-bold text-text-main dark:text-white mb-1">Create New Recipe</h3>
                <p class="text-text-muted dark:text-gray-400 text-sm">Share your culinary masterpiece</p>
            </article>
        </div>
    </main>
    <!-- Simple Footer for completion -->
    <footer class="mt-auto py-8 bg-white dark:bg-card-dark border-t border-[#e6e0db] dark:border-[#3a322a]">
        <div class="max-w-7xl mx-auto px-4 md:px-10 text-center">
            <p class="text-text-muted dark:text-gray-400 text-sm">© 2024 Recipeium. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
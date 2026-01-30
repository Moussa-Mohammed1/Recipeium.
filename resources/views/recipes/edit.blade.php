<!DOCTYPE html>
<html class="light scroll-smooth" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Recipeium - Edit Recipe</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&amp;family=Noto+Sans:wght@400..700&amp;display=swap"
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
                        "background-light": "#fdfbf9",
                        "background-dark": "#1a120b",
                        "soft-cream": "#f8f4f0",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: { "DEFAULT": "0.5rem", "lg": "0.75rem", "xl": "1rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
        }
        .editor-toolbar button {
            @apply p-1.5 rounded hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors;
        }
        .step-timeline::before {
            content: '';
            @apply absolute left-6 top-0 bottom-0 w-0.5 bg-orange-100 dark:bg-orange-900/30 -z-10;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#181411] dark:text-white font-display min-h-screen">
    <div class="flex flex-col h-screen">
        @include('layouts.header')
        <div class="flex flex-1 overflow-hidden">
            <main class="flex-1 overflow-y-auto bg-[#fdfbf9] dark:bg-[#150f0a] p-8">
                <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" id="edit-recipe-form">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="max-w-4xl mx-auto space-y-10">
                        <section class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-2xl font-bold">General Information</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Recipe
                                        Title</label>
                                    <input name="title"
                                        class="w-full bg-white dark:bg-[#1a120b] border border-gray-200 dark:border-gray-800 rounded-xl px-4 py-3 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all"
                                        type="text" name="title" value="{{ $recipe->title }}" />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Category</label>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($categories as $category)
                                            <label
                                                class="flex items-center gap-2 px-3 py-2 rounded-full border cursor-pointer border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark hover:border-primary hover:text-primary text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium transition-colors">
                                                <input type="radio" name="category_id" value="{{ $category->id }}"
                                                    class="hidden peer" @if($recipe->category_id == $category->id) checked
                                                    @endif />
                                                <span class="peer-checked:text-primary">{{ $category->title }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Description</label>
                                <div
                                    class="border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden bg-white dark:bg-[#1a120b]">
                                    <textarea
                                        class="w-full border-none p-4 focus:ring-0 bg-transparent text-[#594a42] dark:text-gray-300 leading-relaxed"
                                        name="description" rows="5">{{ $recipe->description }}</textarea>
                                </div>
                            </div>
                        </section>
                        <section class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-2xl font-bold">Ingredients</h3>
                                <button type="button" id="add-ingredient-btn" class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">
                                    <span class="material-symbols-outlined text-[18px]">add</span> Add Ingredient
                                </button>
                            </div>
                            <div class="space-y-3" id="ingredients-list">
                                @foreach($recipe->ingredients as $ingredient)
                                    <div class="group flex items-center gap-3 p-3 bg-white dark:bg-[#1a120b] border border-gray-200 dark:border-gray-800 rounded-xl hover:shadow-sm transition-shadow ingredient-row">
                                        <input type="hidden" name="ingredients[{{ $loop->index }}][id]" value="{{ $ingredient->id }}" />
                                        <input
                                            class="w-16 border-gray-200 dark:border-gray-800 rounded-lg bg-gray-50 dark:bg-[#221a14] text-center font-bold"
                                            type="text" name="ingredients[{{ $loop->index }}][quantity]"
                                            value="{{ $ingredient->pivot->quantity }}" />
                                        <input
                                            class="w-20 border-gray-200 dark:border-gray-800 rounded-lg bg-gray-50 dark:bg-[#221a14] text-center"
                                            type="text" name="ingredients[{{ $loop->index }}][unit]"
                                            value="{{ $ingredient->pivot->unit }}" />
                                        <input
                                            class="flex-1 border-gray-200 dark:border-gray-800 rounded-lg bg-gray-50 dark:bg-[#221a14] px-3"
                                            type="text" name="ingredients[{{ $loop->index }}][content]"
                                            value="{{ $ingredient->content }}" />
                                        <button type="button" class="p-2 text-gray-300 hover:text-red-500 transition-colors remove-ingredient-btn">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <section class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-2xl font-bold">Preparation Steps</h3>
                                <button type="button" id="add-step-btn" class="text-primary text-sm font-bold flex items-center gap-1 hover:underline">
                                    <span class="material-symbols-outlined text-[18px]">add_circle</span> Add New Step
                                </button>
                            </div>
                            <div class="step-timeline relative space-y-8" id="steps-list">
                                @foreach($recipe->steps as $i => $step)
                                    <div class="relative flex gap-6 step-row">
                                        <div
                                            class="w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center font-bold text-lg shadow-lg shadow-primary/20 shrink-0 step-number">
                                            {{ $i + 1 }}
                                        </div>
                                        <div
                                            class="flex-1 bg-white dark:bg-[#1a120b] border border-gray-200 dark:border-gray-800 rounded-2xl p-6 shadow-sm @if($i == 1) border-l-4 border-l-primary/50 @endif">
                                            <div class="flex flex-col md:flex-row gap-6">
                                                <div class="flex-1 space-y-4">
                                                    <textarea
                                                        class="w-full bg-soft-cream/50 dark:bg-[#221a14] border-none rounded-xl p-4 text-sm resize-none focus:ring-1 focus:ring-primary/20"
                                                        placeholder="Describe the process..."
                                                        name="steps[{{ $i }}][content]"
                                                        rows="3">{{ $step->content }}</textarea>
                                                </div>
                                                <button type="button" class="p-2 text-gray-300 hover:text-red-500 transition-colors remove-step-btn self-start">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <section id="image" class="space-y-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-2xl font-bold">Hero Media</h3>
                            </div>

                            <div
                                class="relative group h-64 rounded-2xl overflow-hidden border-4 border-white dark:border-[#221a14] shadow-xl">
                                <img alt="Hero banner" class="w-full h-full object-cover"
                                    src="{{ asset('storage/' . $recipe->image) }}" />
                                <label for="image-upload"
                                    class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                    <div
                                        class="bg-white text-[#181411] px-6 py-2 rounded-full font-bold shadow-lg flex items-center gap-2">
                                        <span class="material-symbols-outlined">add_photo_alternate</span>
                                        <span>Change Photo</span>
                                    </div>
                                    <input id="image-upload" name="image" type="file" accept="image/*" class="hidden" />
                                </label>
                                <div class="absolute bottom-4 left-4 flex gap-2">
                                    <input type="hidden" name="_method" value="PUT">
                                    <span
                                        class="bg-primary text-white text-[10px] font-bold uppercase px-2 py-1 rounded">Primary
                                        Photo</span>
                                </div>
                            </div>
                        </section>
                        <div class="flex justify-end pt-8">
                            <button type="submit" class="bg-primary text-white px-8 py-3 rounded-xl font-bold shadow hover:bg-orange-600 transition-colors">
                                Update Recipe
                            </button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

</body>

</html>
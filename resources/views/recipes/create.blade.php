<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Publish New Recipe - Recipeium</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&amp;display=swap"
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
                        "surface-light": "#ffffff",
                        "surface-dark": "#2a2119",
                        "text-main-light": "#181411",
                        "text-main-dark": "#f5f2f0",
                        "text-secondary-light": "#8a7560",
                        "text-secondary-dark": "#b0a294",
                        "border-light": "#e6e0db",
                        "border-dark": "#4a3b2f",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark text-text-main-light dark:text-text-main-dark min-h-screen flex flex-col">
    <!-- Top Navigation -->
    @include('layouts.header')
    <!-- Main Content Area -->
    <form action="/recipes" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
        <main class="flex-grow w-full max-w-[960px] mx-auto px-4 py-8 md:py-12 flex flex-col gap-10">
            <!-- Page Heading -->
            <div class="flex flex-col gap-2">
                <h2
                    class="text-3xl md:text-4xl font-black tracking-tight text-text-main-light dark:text-text-main-dark">
                    Share your culinary masterpiece</h2>
                <p class="text-text-secondary-light dark:text-text-secondary-dark text-lg">Help others discover the joy
                    of
                    your cooking.</p>
            </div>
            <!-- Hero Image Upload -->
            <section class="flex flex-col gap-4">

                <label for="recipe_image_upload" class="w-full relative group cursor-pointer block">
                    <input id="recipe_image_upload" name="image" type="file" accept="image/*" class="hidden" />
                    <div
                        class="flex flex-col items-center justify-center gap-4 rounded-xl border-2 border-dashed border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark px-6 py-16 hover:border-primary hover:bg-primary/5 transition-all duration-300">
                        <div
                            class="size-16 rounded-full bg-background-light dark:bg-background-dark flex items-center justify-center text-primary mb-2">
                            <span class="material-symbols-outlined text-3xl">add_photo_alternate</span>
                        </div>
                        <div class="text-center space-y-1">
                            <p class="text-lg font-bold">Upload Recipe Photo</p>
                            <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark">Drag and drop
                                your
                                cover image here, or <span class="underline text-primary">browse</span></p>
                        </div>
                        <span
                            class="mt-4 px-6 py-2.5 bg-primary text-white font-bold text-sm rounded-lg shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-0.5 transition-all cursor-pointer">
                            Browse Files
                        </span>
                    </div>
                </label>
            </section>
            
            <section class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
                <div
                    class="md:col-span-2 space-y-6 bg-surface-light dark:bg-surface-dark p-6 md:p-8 rounded-xl border border-border-light dark:border-border-dark shadow-sm">
                    
                    <div class="space-y-2">
                        <label class="text-base font-bold text-text-main-light dark:text-text-main-dark">Recipe
                            Title</label>
                        <input name="title"
                            class="w-full h-14 px-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none text-lg placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark transition-all"
                            placeholder="e.g. Grandma's Famous Lasagna" type="text" />
                    </div>
                    
                    <div class="space-y-2">
                        <label
                            class="text-base font-bold text-text-main-light dark:text-text-main-dark">Description</label>
                        <textarea name="description"
                            class="w-full min-h-[140px] p-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none resize-none text-base placeholder:text-text-secondary-light dark:placeholder:text-text-secondary-dark transition-all"
                            placeholder="Tell us the story behind this dish, flavor notes, and why it's special..."></textarea>
                    </div>

                </div>
                
                <div class="md:col-span-1 space-y-4">
                    <div
                        class="bg-surface-light dark:bg-surface-dark p-6 rounded-xl border border-border-light dark:border-border-dark shadow-sm">
                        <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">category</span> Category
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categories as $category)
                                <label
                                    class="flex items-center gap-2 px-3 py-2 rounded-full border cursor-pointer border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark hover:border-primary hover:text-primary text-text-secondary-light dark:text-text-secondary-dark text-sm font-medium transition-colors">
                                    <input type="radio" name="category_id" value="{{ $category->id }}"
                                        class="hidden peer" />
                                    <span class="peer-checked:text-primary">{{ $category->title }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>
            </section>
            
            <section
                class="bg-surface-light dark:bg-surface-dark p-6 md:p-8 rounded-xl border border-border-light dark:border-border-dark shadow-sm">
                <h3
                    class="text-2xl font-bold mb-6 text-text-main-light dark:text-text-main-dark flex items-center gap-3">
                    <span class="bg-primary/20 text-primary p-2 rounded-lg">
                        <span class="material-symbols-outlined">grocery</span>
                    </span>
                    Ingredients
                </h3>
                <div id="ingred" class="space-y-4">
                    <!-- Ingredient Row 1 -->
                    <div class="flex Ingredients flex-wrap md:flex-nowrap gap-3 items-center group">
                        <div class="cursor-move text-text-secondary-light dark:text-text-secondary-dark opacity-50 hover:opacity-100">
                            <span class="material-symbols-outlined">drag_indicator</span>
                        </div>
                        <input name="quantity[0]" class="w-24 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none" placeholder="Amount" type="text" value="500" />
                        <select name="unit[0]" class="w-32 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none">
                            <option>g</option>
                            <option>kg</option>
                            <option>cup</option>
                            <option>ml</option>
                            <option>oz</option>
                        </select>
                        <input name="content[0]" class="flex-1 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none" placeholder="Ingredient name (e.g. Flour)" type="text" value="All-purpose flour" />
                        <button onclick="this.closest('.Ingredients').remove()" type="button" class="p-2 text-text-secondary-light hover:text-red-500 transition-colors">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>
                </div>
                <!-- Add Button -->
                <button onclick="plusIngredient();" type="button"
                    class="mt-4 flex items-center gap-2 text-primary font-bold hover:bg-primary/5 px-4 py-3 rounded-lg transition-colors w-full md:w-auto justify-center md:justify-start border-2 border-dashed border-primary/30 hover:border-primary">
                    <span class="material-symbols-outlined">add_circle</span>
                    Add Ingredient
                </button>
                <script>
                    let ingredients = document.getElementById('ingred');
                    let i = 1;
                    function plusIngredient() {
                        let newIngred = document.createElement('div');
                        newIngred.className = 'flex Ingredients flex-wrap md:flex-nowrap gap-3 items-center group';
                        newIngred.innerHTML = `
                            <div class=\"cursor-move text-text-secondary-light dark:text-text-secondary-dark opacity-50 hover:opacity-100\">
                                <span class=\"material-symbols-outlined\">drag_indicator</span>
                            </div>
                            <input name=\"quantity[${i}]\" class=\"w-24 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none\" placeholder=\"Amount\" type=\"text\" />
                            <select name=\"unit[${i}]\" class=\"w-32 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none\">
                                <option>whole</option>
                                <option>g</option>
                                <option>tbsp</option>
                            </select>
                            <input name=\"content[${i}]\" class=\"flex-1 px-4 py-3 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none\" placeholder=\"Ingredient name\" type=\"text\"  />
                            <button onclick=\"this.closest('.Ingredients').remove()\" type=\"button\" class=\"p-2 text-text-secondary-light hover:text-red-500 transition-colors\">
                                <span class=\"material-symbols-outlined\">delete</span>
                            </button>
                        `;
                        ingredients.appendChild(newIngred);
                        i++;
                    }
                    
                </script>
            </section>
            <!-- Method / Steps Section -->
            <section
                class="bg-surface-light dark:bg-surface-dark p-6 md:p-8 rounded-xl border border-border-light dark:border-border-dark shadow-sm">
                <h3
                    class="text-2xl font-bold mb-8 text-text-main-light dark:text-text-main-dark flex items-center gap-3">
                    <span class="bg-primary/20 text-primary p-2 rounded-lg">
                        <span class="material-symbols-outlined">format_list_numbered</span>
                    </span>
                    Instructions
                </h3>
                <div class="relative pl-0 md:pl-4 space-y-12">
                    <!-- Vertical Line -->
                    <div
                        class="absolute left-[27px] md:left-[31px] top-4 bottom-20 w-0.5 bg-border-light dark:bg-border-dark z-0 hidden md:block">
                    </div>
                    <!-- Step 1 -->
                    <div class="relative Steps z-10 grid grid-cols-1 md:grid-cols-[auto_1fr] gap-6">
                        <div class="hidden md:flex size-10 rounded-full bg-primary text-white font-bold items-center justify-center shrink-0 shadow-md">1</div>
                        <div class="flex flex-col gap-4">
                            <div class="md:hidden flex items-center gap-3 mb-2">
                                <div class="flex size-8 rounded-full bg-primary text-white font-bold items-center justify-center shrink-0">1</div>
                                <span class="font-bold text-lg">Step 1</span>
                            </div>
                            <textarea name="steps[]" class="w-full min-h-[120px] p-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none resize-none" placeholder="Describe this step in detail..."></textarea>
                            <div class="flex items-center gap-4">
                                <button type="button" onclick="this.closest('.Steps').remove()" class="flex items-center gap-2 text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark hover:text-red-500 transition-colors ml-auto">
                                    <span class="material-symbols-outlined">delete</span> Remove step
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative z-10 grid grid-cols-1 md:grid-cols-[auto_1fr] gap-6 pt-4">
                        
                        <button onclick="plusStep();" type="button"
                            class="flex items-center justify-center md:justify-start gap-2 text-primary font-bold hover:bg-primary/5 px-6 py-3 rounded-lg transition-colors border-2 border-dashed border-primary/30 hover:border-primary">
                            <span class="material-symbols-outlined text-sm">add</span>Add Next Step
                        </button>
                    </div>
                </div>
            </section>
        </main>
        <!-- Sticky Footer Action Bar -->
        <div
            class="sticky bottom-0 z-40 bg-surface-light dark:bg-surface-dark border-t border-border-light dark:border-border-dark py-4 px-6 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
            <div class="max-w-[960px] mx-auto flex items-center justify-between">
                <button type="button"
                    class="text-text-secondary-light dark:text-text-secondary-dark hover:text-text-main-light font-medium px-4 py-2 rounded-lg transition-colors">
                    Cancel
                </button>
                <div class="flex gap-4">

                    <button type="submit" onclick="createRecipe();"
                        class="px-8 py-3 rounded-lg bg-primary text-white font-bold shadow-lg shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-0.5 transition-all flex items-center gap-2">
                        <span>Publish Recipe</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <script>
                        let stepsContainer = document.querySelector('.relative.pl-0.md\\:pl-4.space-y-12');
                    let j = 1;
                    function plusStep() {
                        let newStep = document.createElement('div');
                        newStep.className = 'relative Steps z-10 grid grid-cols-1 md:grid-cols-[auto_1fr] gap-6';
                        newStep.innerHTML = `
                            <div class="hidden md:flex size-10 rounded-full bg-primary text-white font-bold items-center justify-center shrink-0 shadow-md">${j+1}</div>
                            <div class="flex flex-col gap-4">
                                <div class="md:hidden flex items-center gap-3 mb-2">
                                    <div class="flex size-8 rounded-full bg-primary text-white font-bold items-center justify-center shrink-0">${j+1}</div>
                                    <span class="font-bold text-lg">Step ${j+1}</span>
                                </div>
                                <textarea name="steps[]" class="w-full min-h-[120px] p-4 rounded-lg bg-background-light dark:bg-background-dark border border-border-light dark:border-border-dark focus:border-primary outline-none resize-none" placeholder="Describe this step in detail..."></textarea>
                                <div class="flex items-center gap-4">
                                    <button type="button" onclick="this.closest('.Steps').remove()" class="flex items-center gap-2 text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark hover:text-red-500 transition-colors ml-auto">
                                        <span class="material-symbols-outlined">delete</span> Remove step
                                    </button>
                                </div>
                            </div>
                        `;
                        stepsContainer.insertBefore(newStep, stepsContainer.lastElementChild);
                        j++;
                    }
                    </script>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
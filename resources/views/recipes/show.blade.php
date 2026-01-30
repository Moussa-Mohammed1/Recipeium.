<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Recipeium - Spicy Basil Thai Chicken</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&amp;family=Noto+Sans:wght@400..700&amp;display=swap"
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* Custom checkbox styles */
        input[type="checkbox"]:checked+div {
            background-color: #f48c25;
            border-color: #f48c25;
        }

        input[type="checkbox"]:checked+div .check-icon {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#181411] dark:text-white font-display">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        @include('layouts.header')

        <main class="flex-1">
            <div class="w-full relative h-[50vh] min-h-[400px]">
                <div class="absolute inset-0 bg-cover bg-center"
                    style='background-image: url("{{ asset('storage/' . $recipe->image) }}");'>
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent flex flex-col justify-end pb-12 px-6 md:px-20 lg:px-40">
                    <div class="max-w-[960px] mx-auto w-full">
                        <div class="flex flex-wrap gap-3 mb-4">
                            <span class="px-3 py-1 bg-primary text-white text-xs font-bold uppercase tracking-wider rounded-full backdrop-blur-sm">
                                {{ $recipe->category->title }}
                            </span>
                        </div>
                        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 drop-shadow-md">
                            {{ $recipe->title }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-6 text-white/90">
                            <div class="flex items-center gap-2">
                                <img class="w-8 h-8 rounded-full border-2 border-primary object-cover"
                                    src="{{ $recipe->user->image ?? 'https://i.pinimg.com/736x/cc/9a/21/cc9a217851caac8b48adb7917e4c890c.jpg' }}" />
                                <span class="text-sm font-medium">By {{ $recipe->user->name }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-primary text-[20px]">star</span>
                                <span class="font-bold">4.8</span>
                                <span class="text-sm opacity-80">({{ count($recipe->comments) }})</span>
                            </div>
                            <div class="hidden sm:block w-1 h-1 bg-white/50 rounded-full"></div>
                            <span class="text-sm hidden sm:block">{{ $recipe->created_at->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 md:px-10 lg:px-40 -mt-12 relative z-10 pb-20">
                <div class="max-w-[960px] mx-auto bg-white dark:bg-[#1a120b] rounded-xl shadow-xl border border-[#e6e0db] dark:border-[#3a2d20] overflow-hidden">
                    
                    <div class="p-6 md:p-8 border-b border-[#f0ebe8] dark:border-[#3a2d20] flex flex-col md:flex-row gap-6 justify-between items-start md:items-center">
                        <div class="flex flex-wrap gap-4 md:gap-8">
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-primary/10 rounded-full text-primary">
                                    <span class="material-symbols-outlined text-[20px]">schedule</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs text-[#8a7560] uppercase">Prep</span>
                                    <span class="font-bold text-sm">15 min</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="p-2 bg-primary/10 rounded-full text-primary">
                                    <span class="material-symbols-outlined text-[20px]">timer</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs text-[#8a7560] uppercase">Cook</span>
                                    <span class="font-bold text-sm">10 min</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3 w-full md:w-auto">
                            <button class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2 border border-[#e6e0db] dark:border-[#3a2d20] rounded-lg hover:bg-gray-50 dark:hover:bg-[#2a2018] transition-colors">
                                <span class="material-symbols-outlined text-[20px]">favorite</span>
                                <span class="text-sm font-bold">Save</span>
                            </button>
                            @if (auth()->id() === $recipe->user_id)
                                <a href="{{ route('recipes.edit', $recipe->id) }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2 border border-[#e6e0db] dark:border-[#3a2d20] rounded-lg hover:bg-gray-50 dark:hover:bg-[#2a2018] transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                    <span class="text-sm font-bold">Edit</span>
                                </a>
                                <a href="{{ route('recipes.destroy', $recipe->id) }}" class="flex-1 md:flex-none flex items-center justify-center gap-2 px-4 py-2 border border-[#e6e0db] dark:border-[#3a2d20] rounded-lg hover:bg-gray-50 dark:hover:bg-[#2a2018] transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">Delete</span>
                                    <span class="text-sm font-bold">Delete</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-1/3 p-6 md:p-8 bg-[#fdfbf9] dark:bg-[#1f1610] border-r border-[#f0ebe8] dark:border-[#3a2d20]">
                            <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">shopping_basket</span> Ingredients
                            </h3>
                            <div class="space-y-4">
                                @foreach ($recipe->ingredients as $ingredient)
                                    <label class="flex items-start gap-3 cursor-pointer group">
                                        <div class="relative flex items-center mt-1">
                                            <input type="checkbox" class="peer sr-only" />
                                            <div class="w-5 h-5 border-2 border-[#d0c6be] dark:border-[#5a483a] rounded peer-checked:bg-primary peer-checked:border-primary flex items-center justify-center transition-all">
                                                <span class="material-symbols-outlined text-white text-[14px] opacity-0 peer-checked:opacity-100">check</span>
                                            </div>
                                        </div>
                                        <span class="text-sm leading-tight text-[#181411] dark:text-gray-200 group-hover:text-primary">
                                            {{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->unit }} <strong>{{ $ingredient->content }}</strong>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="w-full lg:w-2/3 p-6 md:p-8">
                            <h3 class="text-xl font-bold mb-8 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">menu_book</span> Instructions
                            </h3>
                            <div class="space-y-8">
                                @foreach ($recipe->steps as $step)
                                    <div class="flex gap-4 group">
                                        <div class="flex flex-col items-center">
                                            <div class="w-10 h-10 shrink-0 rounded-full bg-primary text-white flex items-center justify-center text-lg font-bold shadow-lg shadow-primary/20">
                                                {{ $step->order }}
                                            </div>
                                            @if(!$loop->last)
                                                <div class="w-0.5 flex-1 bg-[#e6e0db] dark:bg-[#3a2d20] my-2"></div>
                                            @endif
                                        </div>
                                        <div class="bg-white dark:bg-[#2a2018] border border-[#e6e0db] dark:border-[#3a2d20] rounded-xl p-5 flex-1 shadow-sm">
                                            <p class="text-[#594a42] dark:text-gray-300 leading-relaxed">{{ $step->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @auth
                        <div class="p-6 md:p-8 border-t border-[#f0ebe8] dark:border-[#3a2d20]">
                            <form action="/comments" method="POST" class="flex flex-col gap-4">
                                @csrf
                                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <textarea name="content" rows="3"
                                    class="w-full rounded-lg border border-[#e6e0db] dark:border-[#3a2d20] bg-white dark:bg-[#1a120b] p-3 text-[#181411] dark:text-white focus:border-primary focus:ring-1 focus:ring-primary"
                                    placeholder="Add a comment..." required></textarea>
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="px-5 py-2 rounded-lg bg-primary text-white font-bold hover:bg-orange-600 transition-colors">Post
                                        Comment</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                    <div class="p-6 md:p-8 border-t border-[#f0ebe8] dark:border-[#3a2d20]">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2 text-[#181411] dark:text-white">
                            <span class="material-symbols-outlined text-primary">forum</span>
                            Comments ({{ $recipe->comments->count() }})
                        </h3>

                        <div class="space-y-4">
                            @forelse ($recipe->comments as $comment)
                                <div
                                    class="group flex items-start gap-4 bg-[#fcfbf9] dark:bg-[#1a120b] rounded-xl p-5 transition-all hover:shadow-sm border border-[#f0ebe8] dark:border-[#2d241d]">
                                    <div class="shrink-0">
                                        <img src="{{ $comment->user->image ?? 'https://i.pinimg.com/736x/6a/26/69/6a266962a0f88a917139687a129c40f5.jpg' }}"
                                            class="w-11 h-11 rounded-full object-cover ring-2 ring-primary/20"
                                            alt="{{ $comment->user->name }}">
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-sm text-[#181411] dark:text-white">
                                                    {{ $comment->user->name ?? 'User' }}
                                                </span>
                                                <span
                                                    class="text-[11px] font-medium uppercase tracking-wider text-[#8a7560] dark:text-gray-500">
                                                    • {{ $comment->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="text-[#594a42] dark:text-gray-300 text-sm leading-relaxed"
                                            id="comment-content-{{ $comment->id }}">
                                            {{ $comment->content }}
                                        </div>

                                        <div class="hidden mt-2" id="comment-edit-{{ $comment->id }}">
                                            <textarea id="comment-input-{{ $comment->id }}"
                                                class="w-full rounded-lg border-gray-200 dark:border-[#3a2d20] text-sm focus:ring-primary focus:border-primary dark:bg-[#120a05] dark:text-white"
                                                rows="2">{{ $comment->content }}</textarea>
                                            <div class="flex gap-2 mt-2">
                                                <button type="button" onclick="submitEditComment({{ $comment->id }})"
                                                    class="px-4 py-1.5 bg-primary text-white text-xs font-bold rounded-full hover:bg-orange-600 transition-colors">
                                                    Save Changes
                                                </button>
                                                <button type="button" onclick="cancelEditComment({{ $comment->id }})"
                                                    class="px-4 py-1.5 bg-gray-100 dark:bg-[#2d241d] text-gray-600 dark:text-gray-300 text-xs font-bold rounded-full hover:bg-gray-200 transition-colors">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>

                                        @if (auth()->id() === $comment->user_id)
                                            <div class="flex gap-4 mt-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button type="button" onclick="enableEditComment({{ $comment->id }})"
                                                    class="flex items-center gap-1 text-[12px] font-bold text-[#8a7560] hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-sm">edit_note</span> Edit
                                                </button>

                                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center gap-1 text-[12px] font-bold text-[#8a7560] hover:text-red-500 transition-colors">
                                                        <span class="material-symbols-outlined text-sm">delete</span> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="text-center py-8 bg-[#f8f7f5] dark:bg-[#1a120b] rounded-xl border-2 border-dashed border-[#e6e0db] dark:border-[#3a2d20]">
                                    <span class="material-symbols-outlined text-4xl text-[#8a7560] mb-2">auto_stories</span>
                                    <p class="text-[#8a7560] dark:text-gray-400 font-medium">No comments yet. Be the first
                                        to share your thoughts!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Script moved outside of loop --}}
                    <script>
                        function enableEditComment(id) {
                            document.getElementById(`comment-content-${id}`).classList.add('hidden');
                            document.getElementById(`comment-edit-${id}`).classList.remove('hidden');
                        }

                        function cancelEditComment(id) {
                            document.getElementById(`comment-content-${id}`).classList.remove('hidden');
                            document.getElementById(`comment-edit-${id}`).classList.add('hidden');
                        }

                        function submitEditComment(id) {
                            const content = document.getElementById(`comment-input-${id}`).value;
                            const token = document.querySelector('meta[name="csrf-token"]')?.content ||
                                document.querySelector('input[name="_token"]')?.value;

                            fetch(`{{ url('/comments') }}/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json',
                                },
                                body: JSON.stringify({ content: content })
                            })
                                .then(res => res.json())
                                .then(data => {
                                    document.getElementById(`comment-content-${id}`).textContent = data.content;
                                    cancelEditComment(id);
                                })
                        }
                    </script>
                </div>
            </div>
        </main>

        <footer class="bg-white dark:bg-[#1a120b] border-t border-[#e6e0db] dark:border-[#3a2d20] py-10 text-center">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="material-symbols-outlined text-primary text-2xl">skillet</span>
                <span class="font-bold text-lg">Recipeium</span>
            </div>
            <p class="text-[#8a7560] text-sm">© 2026 Recipeium. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
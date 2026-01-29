<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::with('categories', 'users')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('recipes.recipes', compact('recipes'));

    }
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
            'id_category' => 'required|exists:categories,id',
        ]);

        $recipe = Recipe::create($validated);


        return redirect()->route('recipes.recipes')
            ->with('success', 'Recipe created successfully!');
    }

    public function show(Recipe $recipe)
    {
        $recipe->load('category', 'ingredients', 'steps', 'comments');
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {

        return view('recipes.edit', compact('recipe'));
    }

    
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:255',
            'top_day' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);
        $recipe->update($validated);
        return redirect()->route('recipes.show', $recipe);
    }

    public function destroy(Recipe $recipe)
    {
        
        $recipe->delete();

        return redirect()->route('recipes.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $recipes = Recipe::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(15);

        return view('recipes.index', compact('recipes'));
    }

    public function popular()
    {
        $recipes = Recipe::get()->where('top_day', true);
        return view('recipes.popular', compact('recipes'));
    }

    public function byCategory($categoryId)
    {
        $recipes = Recipe::where('id_category', $categoryId)
            ->with('category')
            ->paginate(15);

        return view('recipes.recipes', compact('recipes'));
    }

    public function topOfTheDay()
    {
        $recipes = Recipe::where('top_day', true)
            ->with('category')
            ->get();

        return view('recipes.top', compact('recipes'));
    }
}

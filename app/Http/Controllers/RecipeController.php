<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Step;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::with('category', 'user')
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
            'user_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');
        $validated['image'] = $imagePath;
        $recipe = Recipe::create($validated);

        $quantities = $request->input('quantity', []);
        $units = $request->input('unit', []);
        $contents = $request->input('content', []);
        
        $ingredientsIds = [];
        foreach($contents as $idx => $content){
            $ingredient = Ingredient::create(['content' => $content]);
            $ingredientsIds[$ingredient->id] = [
                'quantity' => $quantities[$idx],
                'unit' => $units[$idx]
            ];
        }
        $recipe->ingredients()->attach($ingredientsIds);
        foreach ($request->steps as $step => $content) {
            Step::create([
                'content' => $content,
                'recipe_id' => $recipe->id,
                'order' => $step + 1
            ]);
        }

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        $recipe->load('category', 'ingredients', 'steps', 'comments', 'user');
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $recipe->load('category', 'ingredients', 'steps', 'user');
        return view('recipes.edit', compact('recipe', 'categories'));
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

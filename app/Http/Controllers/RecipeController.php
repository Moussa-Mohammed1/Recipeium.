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
            ->get();
        $categories = Category::all();
        return view('recipes.recipes', [
            'recipes' => $recipes,
            'categories' => $categories,
            'searchTerm' => '',
            'selectedCategory' => '',
        ]);

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
        foreach ($contents as $idx => $content) {
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
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $recipe->update($validated);

        // Update ingredients
        $ingredientsData = $request->input('ingredients', []);
        $ingredientSync = [];
        foreach ($ingredientsData as $ingredient) {
            if (!empty($ingredient['content'])) {
                // Find or create ingredient by content
                $ingredientModel = Ingredient::firstOrCreate([
                    'content' => $ingredient['content']
                ]);
                $ingredientSync[$ingredientModel->id] = [
                    'quantity' => $ingredient['quantity'] ?? '',
                    'unit' => $ingredient['unit'] ?? ''
                ];
            }
        }
        $recipe->ingredients()->sync($ingredientSync);

        // Update steps
        $stepsData = $request->input('steps', []);
        $recipe->steps()->delete();
        foreach ($stepsData as $order => $step) {
            if (!empty($step['content'])) {
                Step::create([
                    'content' => $step['content'],
                    'recipe_id' => $recipe->id,
                    'order' => $order + 1
                ]);
            }
        }

        return redirect()->route('recipes.show', $recipe)->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {

        $recipe->delete();

        return redirect()->route('recipes.index');
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('recipe');

    //     $recipes = Recipe::where('title', 'LIKE', "%{$query}%");

    //     return view('recipes.index', compact('recipes'));
    // }

    public function popular()
    {
        $recipes = Recipe::withCount('comments')
            ->orderByDesc('comments_count')
            ->take(5)
            ->get();
        return view('recipes.popular', compact('recipes'));
    }

    // public function byCategory(int $categoryId)
    // {
    //     $byCategory = Recipe::where('id_category', $categoryId);

    //     return view('recipes.recipes', compact('byCategory'));
    // }

    public function filter(Request $request)
    {
        $searchTerm = $request->input('recipe');
        $categoryId = $request->input('category');

        if ($searchTerm && $categoryId) {
            $recipes = Recipe::where('title', 'LIKE', "%{$searchTerm}%")
                ->where('category_id', $categoryId)
                ->get();
        } elseif ($searchTerm) {
            $recipes = Recipe::where('title', 'LIKE', "%{$searchTerm}%")
                ->get();
        } elseif ($categoryId) {
            $recipes = Recipe::where('category_id', $categoryId)
                ->get();
        } else {
            $recipes = Recipe::all();
        }

        $categories = Category::all();
        return view('recipes.recipes', [
            'recipes' => $recipes,
            'searchTerm' => $searchTerm,
            'selectedCategory' => $categoryId,
            'categories' => $categories
        ]);
    }

    public function topOfTheDay()
    {
        $recipes = Recipe::where('top_day', true)
            ->with('category')
            ->get();

        return view('recipes.top', compact('recipes'));
    }
}

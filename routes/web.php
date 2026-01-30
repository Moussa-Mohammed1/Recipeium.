<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/recipes',[RecipeController::class,'index'] )->name('recipes.index');
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/popular', [RecipeController::class, 'popular']);
//CRUD recipes
Route::get('/recipes/create', [RecipeController::class, 'create']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
Route::get('/recipes/{recipe}/delete', [RecipeController::class, 'destroy'])->name('recipes.destroy');
//get byCategroy
Route::get('/recipes/{category}', [RecipeController::class, 'byCategory']);
use App\Http\Controllers\CommentController;

// Comment routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

// search
Route::post('/recipes/search', [RecipeController::class, 'filter']);
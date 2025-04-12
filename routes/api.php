<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public API routes
Route::post('/signup', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/posts/factory', function (Request $request) {
    $user = \App\Models\User::factory()->create();
    $posts = \App\Models\Post::factory(10)->create(['user_id' => $user->id]);
    return response()->json($posts);
});

// Protected API routes
Route::middleware('auth:sanctum')->group( function () {
  Route::apiResource('users', UserController::class)->except(['store']);
  Route::apiResource('posts', PostController::class);
});
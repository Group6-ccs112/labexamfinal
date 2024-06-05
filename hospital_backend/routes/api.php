<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'getAllUsers']); // Route to get all users
Route::put('/users/{id}', [UserController::class, 'updateUser']); // Route to update a user
Route::delete('/users/{id}', [UserController::class, 'deleteUser']); // Route to delete a user
Route::get('/users/{role}', [UserController::class, 'getUsersByRole']);


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

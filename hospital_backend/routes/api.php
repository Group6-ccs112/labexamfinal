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

// For doctor api end points
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::post('/addDoctors', [DoctorController::class, 'store']);
Route::put('/doctors/{id}', [DoctorController::class, 'update']);
Route::delete('/removeDoctor/{id}', [ProductController::class, 'destroy']);

// For patient api end points
Route::get('/patients', [ProductController::class, 'index']);
Route::get('/patients/{id}', [ProductController::class, 'show']);
Route::post('/addPatients', [ProductController::class, 'store']);
Route::put('/patients/{id}', [ProductController::class, 'update']);
Route::delete('/removePatient/{id}', [ProductController::class, 'destroy']);

// For appointment record api end points
Route::get('/patients', [ProductController::class, 'index']);
Route::get('/patients/{id}', [ProductController::class, 'show']);
Route::post('/addPatients', [ProductController::class, 'store']);
Route::put('/patients/{id}', [ProductController::class, 'update']);
Route::delete('/removePatient/{id}', [ProductController::class, 'destroy']);

// For meidcal record api end points
Route::get('/patients', [ProductController::class, 'index']);
Route::get('/patients/{id}', [ProductController::class, 'show']);
Route::post('/addPatients', [ProductController::class, 'store']);
Route::put('/patients/{id}', [ProductController::class, 'update']);
Route::delete('/removePatient/{id}', [ProductController::class, 'destroy']);

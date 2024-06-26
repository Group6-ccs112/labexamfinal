<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;

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
Route::delete('/removeDoctor/{id}', [DoctorController::class, 'destroy']);

// For patient api end points
Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::post('/addPatients', [PatientController::class, 'store']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::delete('/removePatient/{id}', [PatientController::class, 'destroy']);

// For appointment record api end points
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
Route::post('/addAppointments', [AppointmentController::class, 'store']);
Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
Route::delete('/removeAppointments/{id}', [AppointmentController::class, 'destroy']);

// For medical record api end points
Route::get('/medical_records', [MedicalRecordController::class, 'index']);
Route::get('/medical_records/{id}', [MedicalRecordController::class, 'show']);
Route::post('/addMedical_records', [MedicalRecordController::class, 'store']);
Route::put('/medical_records/{id}', [MedicalRecordController::class, 'update']);
Route::delete('/removeMedical_records/{id}', [MedicalRecordController::class, 'destroy']);

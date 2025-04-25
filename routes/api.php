<?php

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExerciseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Outras rotas autenticadas
    Route::get('/trainings', [TrainingController::class, 'index']);
    Route::post('/trainings', [TrainingController::class, 'store']);
    Route::put('/trainings/{uuid}', [TrainingController::class, 'update']);
    Route::get('/trainings/{uuid}', [TrainingController::class, 'show']);
    Route::delete('/trainings/{uuid}', [TrainingController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('trainings/{training_uuid}')->group(function () {
    Route::get('exercises', [ExerciseController::class, 'index']);
    Route::post('exercises', [ExerciseController::class, 'store']);
    Route::get('exercises/{uuid}', [ExerciseController::class, 'show']);
    Route::put('exercises/{uuid}', [ExerciseController::class, 'update']);
    Route::delete('exercises/{uuid}', [ExerciseController::class, 'destroy']);
});

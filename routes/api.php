<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExerciseController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD de Treinos
    Route::get('/trainings', [TrainingController::class, 'index']);
    Route::post('/trainings', [TrainingController::class, 'store']);
    Route::put('/trainings/{uuid}', [TrainingController::class, 'update']);
    Route::get('/trainings/{uuid}', [TrainingController::class, 'show']);
    Route::delete('/trainings/{uuid}', [TrainingController::class, 'destroy']);

    // CRUD de Exercícios vinculados ao treino
    Route::prefix('trainings/{training_uuid}')->group(function () {
        Route::get('/exercises', [ExerciseController::class, 'index']);
        Route::post('/exercises', [ExerciseController::class, 'store']);
        Route::get('/exercises/{uuid}', [ExerciseController::class, 'show']);
        Route::put('/exercises/{uuid}', [ExerciseController::class, 'update']);
        Route::delete('/exercises/{uuid}', [ExerciseController::class, 'destroy']);
    });
});

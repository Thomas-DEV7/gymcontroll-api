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
    Route::get('/trainings/{uuid}', [TrainingController::class, 'show']);
    Route::delete('/trainings/{uuid}', [TrainingController::class, 'destroy']);

    Route::post('/trainings/{training_uuid}/exercises', [ExerciseController::class, 'store']);
    Route::delete('/trainings/{training_uuid}/exercises/{exercise_uuid}', [ExerciseController::class, 'destroy']);
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExecutionController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/docs', function () {
    return view('api-docs');
});
Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/me', [AuthController::class, 'update']);


    Route::post('/logout', [AuthController::class, 'logout']);

    // Trainings
    Route::get('/trainings', [TrainingController::class, 'index']);
    Route::post('/trainings', [TrainingController::class, 'store']);
    Route::get('/trainings/{uuid}', [TrainingController::class, 'show']);
    Route::put('/trainings/{uuid}', [TrainingController::class, 'update']);
    Route::delete('/trainings/{uuid}', [TrainingController::class, 'destroy']);

    // Exercises
    Route::get('/trainings/{training_uuid}/exercises', [ExerciseController::class, 'index']);
    Route::post('/trainings/{training_uuid}/exercises', [ExerciseController::class, 'store']);
    Route::get('/trainings/{training_uuid}/exercises/{uuid}', [ExerciseController::class, 'show']);
    Route::put('/trainings/{training_uuid}/exercises/{uuid}', [ExerciseController::class, 'update']);
    Route::delete('/trainings/{training_uuid}/exercises/{uuid}', [ExerciseController::class, 'destroy']);

    // Executions (simplificado)
    Route::get('/exercises/{exercise_uuid}/executions', [ExecutionController::class, 'index']);
    Route::post('/exercises/{exercise_uuid}/executions', [ExecutionController::class, 'store']);
    Route::get('/executions/{uuid}', [ExecutionController::class, 'show']);
    Route::put('/executions/{uuid}', [ExecutionController::class, 'update']);
    Route::delete('/executions/{uuid}', [ExecutionController::class, 'destroy']);
});

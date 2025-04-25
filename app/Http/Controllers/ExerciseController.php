<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExerciseController extends Controller
{
    public function store(Request $request, $training_uuid)
    {
        try {
            $training = Training::where('uuid', $training_uuid)->firstOrFail();

            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $exercise = Exercise::create([
                'uuid' => Str::uuid(),
                'name' => $request->name,
                'training_id' => $training->id,
            ]);

            return response()->json([
                'message' => 'Exercício cadastrado com sucesso.',
                'data' => $exercise,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar exercício.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

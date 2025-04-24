<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TrainingController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $training = Training::create([
                'uuid' => Str::uuid(),
                'name' => $validated['name'],
                'user_id' => auth()->id(),
            ]);

            return response()->json([
                'message' => 'Treino criado com sucesso.',
                'data' => $training
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erro ao criar treino: ' . $e->getMessage());

            return response()->json([
                'message' => 'Erro inesperado ao criar treino.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($uuid)
    {
        $training = Training::where('uuid', $uuid)
            ->with('exercises')
            ->firstOrFail();

        return response()->json([
            'uuid' => $training->uuid,
            'name' => $training->name,
            'exercises' => $training->exercises->map(function ($exercise) {
                return [
                    'uuid' => $exercise->uuid,
                    'name' => $exercise->name
                ];
            })
        ]);
    }



    
}

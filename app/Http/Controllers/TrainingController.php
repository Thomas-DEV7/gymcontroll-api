<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();

            $trainings = Training::where('user_id', $user->id)->get();

            return response()->json([
                'message' => 'Treinos recuperados com sucesso.',
                'data' => $trainings
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao recuperar treinos.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $uuid)
    {
        try {
            $training = Training::where('uuid', $uuid)->where('user_id', auth()->id())->firstOrFail();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $training->update([
                'name' => $validated['name'],
            ]);

            return response()->json([
                'message' => 'Treino atualizado com sucesso.',
                'data' => $training,
            ]);
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar treino: ' . $e->getMessage());

            return response()->json([
                'message' => 'Erro ao atualizar o treino.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

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
        try {
            $training = Training::where('uuid', $uuid)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            return response()->json([
                'message' => 'Treino recuperado com sucesso.',
                'data' => $training
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao buscar o treino.',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function destroy($uuid)
    {
        try {
            $training = Training::where('uuid', $uuid)->where('user_id', auth()->id())->firstOrFail();
            $training->delete();

            return response()->json([
                'message' => 'Treino excluído com sucesso.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao excluir o treino.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}

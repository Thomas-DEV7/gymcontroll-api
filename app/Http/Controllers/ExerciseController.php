<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Exercise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($training_uuid)
    {
        $training = Training::where('uuid', $training_uuid)->firstOrFail();
        $exercises = Exercise::where('training_id', $training->id)->get();

        return response()->json([
            'message' => 'Exercícios listados com sucesso.',
            'data' => $exercises
        ]);
    }

    public function store(Request $request, $training_uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $training = Training::where('uuid', $training_uuid)->firstOrFail();

        $exercise = Exercise::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'training_id' => $training->id,
        ]);

        return response()->json([
            'message' => 'Exercício criado com sucesso.',
            'data' => $exercise
        ], 201);
    }

    public function show($training_uuid, $uuid)
    {
        $training = Training::where('uuid', $training_uuid)->firstOrFail();
        $exercise = Exercise::where('uuid', $uuid)->where('training_id', $training->id)->firstOrFail();

        return response()->json([
            'message' => 'Exercício encontrado.',
            'data' => $exercise
        ]);
    }

    public function update(Request $request, $training_uuid, $uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $training = Training::where('uuid', $training_uuid)->firstOrFail();
        $exercise = Exercise::where('uuid', $uuid)->where('training_id', $training->id)->firstOrFail();

        $exercise->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Exercício atualizado com sucesso.',
            'data' => $exercise
        ]);
    }

    public function destroy($training_uuid, $uuid)
    {
        $training = Training::where('uuid', $training_uuid)->firstOrFail();
        $exercise = Exercise::where('uuid', $uuid)->where('training_id', $training->id)->firstOrFail();

        $exercise->delete();

        return response()->json([
            'message' => 'Exercício excluído com sucesso.'
        ]);
    }
}

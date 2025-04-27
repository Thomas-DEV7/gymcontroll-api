<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Execution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExecutionController extends Controller
{
    public function index($exercise_uuid)
    {
        $exercise = Exercise::where('uuid', $exercise_uuid)->firstOrFail();
        $executions = Execution::where('exercise_id', $exercise->id)->get();

        return response()->json([
            'message' => 'Execuções listadas com sucesso.',
            'data' => $executions
        ]);
    }

    public function store(Request $request, $exercise_uuid)
    {
        $request->validate([
            'weight' => 'required|integer',
            'amount' => 'required|integer'
        ]);

        $exercise = Exercise::where('uuid', $exercise_uuid)->first();

        $execution = Execution::create([
            'uuid' => Str::uuid(),
            'exercise_id' => $exercise->id,
            'weight' => $request->weight,
            'amount' => $request->amount
        ]);

        return response()->json([
            'message' => 'Execução registrada com sucesso.',
            'data' => $execution
        ], 201);
    }

    public function show($uuid)
    {
        $execution = Execution::where('uuid', $uuid)->firstOrFail();

        return response()->json([
            'message' => 'Execução encontrada.',
            'data' => $execution
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'weight' => 'required|integer',
            'amount' => 'required|integer'
        ]);

        $execution = Execution::where('uuid', $uuid)->firstOrFail();

        $execution->update([
            'weight' => $request->weight,
            'amount' => $request->amount
        ]);

        return response()->json([
            'message' => 'Execução atualizada com sucesso.',
            'data' => $execution
        ]);
    }

    public function destroy($uuid)
    {
        $execution = Execution::where('uuid', $uuid)->firstOrFail();
        $execution->delete();

        return response()->json([
            'message' => 'Execução excluída com sucesso.'
        ]);
    }
}

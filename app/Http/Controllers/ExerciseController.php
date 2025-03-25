<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Training;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function store(Request $request, $training_uuid)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $training = Training::where('uuid', $training_uuid)->firstOrFail();

        $exercise = Exercise::create([
            'name' => $request->name,
            'training_id' => $training->id
        ]);

        return response()->json([
            'uuid' => $exercise->uuid,
            'name' => $exercise->name
        ], 201);
    }

    public function destroy($training_uuid, $exercise_uuid)
    {
        $training = Training::where('uuid', $training_uuid)->firstOrFail();

        $exercise = Exercise::where('uuid', $exercise_uuid)
            ->where('training_id', $training->id)
            ->firstOrFail();

        $exercise->delete();

        return response()->json(['message' => 'Exercise deleted successfully.']);
    }
}
                                                                        
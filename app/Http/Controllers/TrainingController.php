<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::with('exercises')->get();

        return response()->json($trainings->map(function ($training) {
            return [
                'uuid' => $training->uuid,
                'name' => $training->name,
                'exercises' => $training->exercises->map(function ($exercise) {
                    return [
                        'uuid' => $exercise->uuid,
                        'name' => $exercise->name
                    ];
                })
            ];
        }));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $training = Training::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'uuid' => $training->uuid,
            'name' => $training->name
        ], 201);
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

    public function destroy($uuid)
    {
        $training = Training::where('uuid', $uuid)->firstOrFail();
        $training->delete();

        return response()->json(['message' => 'Training deleted successfully.']);
    }
}

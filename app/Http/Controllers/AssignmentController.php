<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Muestra todos los assignments.
     */
    public function index()
    {
        return response()->json(Assignment::all(), 200);
    }

    /**
     * Guarda un nuevo assignment en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $assignment = Assignment::create($request->all());

        return response()->json($assignment, 201);
    }

    /**
     * Muestra un assignment específico.
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json(['message' => 'Assignment no encontrado'], 404);
        }

        return response()->json($assignment, 200);
    }

    /**
     * Actualiza un assignment.
     */
    public function update(Request $request, $id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json(['message' => 'Assignment no encontrado'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'sometimes|date',
            'subject_id' => 'sometimes|exists:subjects,id',
        ]);

        $assignment->update($request->all());

        return response()->json($assignment, 200);
    }

    /**
     * Elimina un assignment.
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json(['message' => 'Assignment no encontrado'], 404);
        }

        $assignment->delete();

        return response()->json(['message' => 'Assignment eliminado'], 200);
    }
}

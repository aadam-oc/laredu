<?php

namespace App\Http\Controllers;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\Submission;

class AssignmentController extends Controller
{
    /**
     * Get all assignments (Obtener todas las tareas).
     */
    public function index()
    {
        return response()->json(Assignment::all(), 200);
    }

    /**
     * Create a new assignment (Crear una nueva tarea).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'assignment_id' => 'required|exists:assignments,id',
            'grade' => 'nullable|numeric',
        ]);

        $submission = Submission::create([
            'user_id' => $validated['user_id'],
            'assignment_id' => $validated['assignment_id'],
            'grade' => $validated['grade'] ?? null,
        ]);

        return response()->json(['message' => 'Submission created successfully', 'submission' => $submission], 201);
    }


    /**
     * Show a specific assignment (Mostrar tarea).
     */
    public function show($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json([
                'message' => 'Assignment not found'
            ], 404);
        }

        return response()->json($assignment, 200);
    }

    /**
     * Update an assignment (Actualizar tarea).
     */
    public function update(Request $request, $id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json([
                'message' => 'Assignment not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'subject_id' => 'nullable|exists:subjects,id',
        ]);

        $assignment->update($validated);

        return response()->json([
            'message' => 'Assignment updated successfully',
            'assignment' => $assignment
        ], 200);
    }

    /**
     * Delete an assignment (Eliminar tarea).
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);

        if (!$assignment) {
            return response()->json([
                'message' => 'Assignment not found'
            ], 404);
        }

        $assignment->delete();

        return response()->json([
            'message' => 'Assignment deleted successfully'
        ], 200);
    }
}

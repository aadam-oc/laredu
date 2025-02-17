<?php
namespace App\Http\Controllers;
use App\Models\Submission;
use Illuminate\Http\Request;
class SubmissionController extends Controller
{
    /**
     * Get all submissions (Obtener todas las entregas).
     */
    public function index()
    {
        return response()->json(Submission::all(), 200);
    }
    /**
     * Create a new submission (Registrar una entrega).
     */
    public function store(Request $request)
    {
        \Log::info('Store method reached');
        dd($request->all());

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
     * Show a specific submission (Mostrar entrega).
     */
    public function show($id)
    {
        $submission = Submission::find($id);
        if (!$submission) {
            return response()->json([
                'message' => 'Submission not
    found'
            ], 404);
        }
        return response()->json($submission, 200);
    }
    /**
     * Update submission (e.g. grading) (Actualizar entrega).
     */
    public function update(Request $request, $id)
    {
        $submission = Submission::find($id);
        if (!$submission) {
            return response()->json([
                'message' => 'Submission not
    found'
            ], 404);
        }
        $request->validate([
            'grade' => 'required|numeric|min:0|max:10',
        ]);
        $submission->update($request->only(['grade']));
        return response()->json([
            'message' => 'Grade updated successfully',
            'submission' => $submission
        ], 200);
    }

    /**
     * Delete a specific submission (Eliminar una entrega).
     */
    public function destroy($id)
    {
        $submission = Submission::find($id);

        if (!$submission) {
            return response()->json(['message' => 'Submission not found'], 404);
        }

        $submission->delete();

        return response()->json(['message' => 'Submission deleted successfully'], 200);
    }
}
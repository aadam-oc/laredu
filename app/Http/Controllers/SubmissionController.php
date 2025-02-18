<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function index()
    {
        return Submission::with(['user', 'assignment'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'assignment_id' => 'required|exists:assignments,id',
            'submitted_at' => 'nullable|date',
            'grade' => 'nullable|numeric|min:0|max:100',
        ]);

        return Submission::create($validated);
    }

    public function show($id)
    {
        return Submission::with(['user', 'assignment'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $submission = Submission::findOrFail($id);
        $validated = $request->validate([
            'grade' => 'nullable|numeric|min:0|max:100',
        ]);

        $submission->update($validated);
        return $submission;
    }

    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->delete();

        return response()->json(['message' => 'Submission deleted successfully'], 204);
    }
}

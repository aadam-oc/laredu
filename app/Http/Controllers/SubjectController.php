<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return response()->json(Subject::all(), 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $subject = Subject::create([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return response()->json([
            'message' => 'Subject created successfully',
            'subject' => $subject
        ], 201);
    }



    public function show($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        return response()->json($subject, 200);
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->update($request->only('name'));

        return response()->json([
            'message' => 'Subject updated successfully',
            'subject' => $subject
        ], 200);
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->delete();

        return response()->json(['message' => 'Subject deleted successfully'], 200);
    }
}

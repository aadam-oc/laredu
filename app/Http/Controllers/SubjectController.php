<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Obtener todas las asignaturas.
     */
    public function index()
    {
        $subjects = Subject::with(['course', 'teacher'])->get();
        return response()->json($subjects);
    }

    /**
     * Crear una nueva asignatura.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        $subject = Subject::create($request->all());

        return response()->json($subject, 201);
    }

    /**
     * Obtener una asignatura por ID.
     */
    public function show($id)
    {
        $subject = Subject::with(['course', 'teacher'])->find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        return response()->json($subject);
    }

    /**
     * Actualizar una asignatura.
     */
    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'course_id' => 'exists:courses,id',
            'teacher_id' => 'exists:users,id',
        ]);

        $subject->update($request->all());

        return response()->json($subject);
    }

    /**
     * Eliminar una asignatura.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->delete();

        return response()->json(['message' => 'Subject deleted successfully']);
    }
}

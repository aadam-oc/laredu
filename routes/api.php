<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoleController;

// Rutas públicas (No requieren token)
Route::post('/register', [AuthController::class, 'register']); 
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (Requieren token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); 
    Route::get('/me', [AuthController::class, 'me']); 

    // CRUD de asignaturas
    Route::prefix('subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index']);
        Route::post('/', [SubjectController::class, 'store']);
        Route::get('/{id}', [SubjectController::class, 'show']);
        Route::put('/{id}', [SubjectController::class, 'update']);
        Route::delete('/{id}', [SubjectController::class, 'destroy']);
    });

    // CRUD de assignments
    Route::prefix('assignments')->group(function () {
        Route::get('/', [AssignmentController::class, 'index']);
        Route::post('/', [AssignmentController::class, 'store']);
        Route::get('/{id}', [AssignmentController::class, 'show']);
        Route::put('/{id}', [AssignmentController::class, 'update']);
        Route::delete('/{id}', [AssignmentController::class, 'destroy']);
    });

    // CRUD de submissions
    Route::prefix('submissions')->group(function () {
        Route::get('/', [SubmissionController::class, 'index']);
        Route::post('/', [SubmissionController::class, 'store']);
        Route::get('/{id}', [SubmissionController::class, 'show']);
        Route::put('/{id}', [SubmissionController::class, 'update']);
    });

    // CRUD de eventos del calendario
    Route::prefix('calendar')->group(function () {
        Route::get('/', [CalendarEventController::class, 'index']);
        Route::post('/', [CalendarEventController::class, 'store']);
        Route::get('/{id}', [CalendarEventController::class, 'show']);
        Route::put('/{id}', [CalendarEventController::class, 'update']);
        Route::delete('/{id}', [CalendarEventController::class, 'destroy']);
    });

    // Mensajería
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessageController::class, 'index']);
        Route::post('/', [MessageController::class, 'store']);
        Route::get('/conversation/{userId}', [MessageController::class, 'conversation']);
        Route::put('/{id}/read', [MessageController::class, 'markAsRead']);
        Route::delete('/{id}', [MessageController::class, 'destroy']);
    });

    // Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::post('/users/{userId}/assign-role', [RoleController::class, 'assignRole']);
        Route::post('/users/{userId}/remove-role', [RoleController::class, 'removeRole']);
    });

    // Cursos
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseController::class, 'index']);
        Route::post('/', [CourseController::class, 'store']);
        Route::get('/{id}', [CourseController::class, 'show']);
        Route::put('/{id}', [CourseController::class, 'update']);
        Route::delete('/{id}', [CourseController::class, 'destroy']);
    });
});

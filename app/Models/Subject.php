<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'teacher_id',
    ];

    /**
     * Relación con Course (un subject pertenece a un course).
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relación con User (un subject tiene un profesor).
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Relación con Assignment (un subject tiene muchas tareas).
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}

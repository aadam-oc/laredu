<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'course_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subjects()
    {
        return $this->morphMany(Subject::class, 'subject');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'teacher_id',
        'subject_id',
        'quiz_id',
        'answer_id',
        'score'
    ];
    public function students()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subjects()
    {
        return $this->belongsTo(TeacherClass::class, 'subject_id');
    }
    public function quizzes()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function answers()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }
}

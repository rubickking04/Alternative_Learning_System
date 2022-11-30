<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'title',
        'score',
        'instruction',
        'url',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subject()
    {
        return $this->belongsTo(TeacherClass::class, 'subject_id');
    }
    public function answer()
    {
        return $this->hasMany(Answer::class, 'quiz_id');
    }
    public function hasGrade()
    {
        return $this->hasMany(Grade::class, 'quiz_id');
    }
}

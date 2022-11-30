<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject_id',
        'quiz_id',
        'title'
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function hasQuiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function hasGrade()
    {
        return $this->hasOne(Grade::class, 'answer_id');
    }
}

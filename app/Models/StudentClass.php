<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClass extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'teacher_id',
        'subject_id',
        'uuid',
        'subject',
        'semester',
        'yearLevel',
        'section',
        'description',
    ];
    protected $dates = [
        'deleted_at',
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function subject()
    {
        return $this->belongsTo(TeacherClass::class, 'subject_id');
    }
}

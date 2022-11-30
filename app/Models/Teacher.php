<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'teacher';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasClass()
    {
        return $this->hasMany(TeacherClass::class, 'teacher_id');
    }
    public function hasStudentClass()
    {
        return $this->hasMany(StudentClass::class, 'teacher_id');
    }
    public function hasQuizzes()
    {
        return $this->hasMany(Quiz::class, 'teacher_id');
    }
    public function hasGrade()
    {
        return $this->hasMany(Grade::class, 'teacher_id');
    }
}

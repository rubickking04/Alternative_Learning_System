<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();
        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
    protected $fillable = [
        'teacher_id',
        'subject',
        'semester',
        'section',
        'description',
        'yearLevel',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function lesson()
    {
        return $this->hasMany(StudentClass::class, 'subject_id');
    }
    public function hasQuizzes()
    {
        return $this->hasMany(Quiz::class, 'subject_id');
    }
    public function hasGrade()
    {
        return $this->hasMany(Grade::class, 'subject_id');
    }
}

<?php

namespace App\Http\Controllers\Student;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentClass $teachClass, Quiz $quizz)
    {
        $sub = collect($teachClass)->first();
        $class = StudentClass::where('user_id', '=', Auth::user()->id)->latest()->get();
        $quiz = Grade::orderBy('score', 'DESC')->with('students', 'subjects', 'teachers', 'quizzes', 'answers')->where('subject_id', $quizz->subject_id)->where('quiz_id', $quizz->id)->get();
        $title = $quizz->title;
        $sub_id = $quizz->subject_id;
        $quiz_id = $quizz->id;
        $instruction = $quizz->instruction;
        $file = $quizz->file;
        $score = $quizz->score;
        $created_at = $quizz->created_at;
        $link = $quizz->url;
        $teacher_name = $quizz->teacher->name;
        // dd($score);
        return view('student.quizzes', compact('class', 'created_at', 'sub_id', 'quiz', 'quiz_id', 'title', 'score', 'instruction', 'file', 'link', 'teacher_name'));
    }
}

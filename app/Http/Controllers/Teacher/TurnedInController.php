<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TurnedInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherClass $teachClass, Quiz $quizz, Answer $ans)
    {
        // $class = TeacherClass::where('teacher_id', '=', Auth::guard('teacher')->user()->id)->latest()->get();
        // $quiz = Answer::with('hasGrade')->where('subject_id', $quizz->subject_id)->where('quiz_id', $quizz->id)->latest()->get();
        // $hasGrade = Quiz::with('hasGrade')->where('subject_id', $quizz->subject_id)->get();
        // $grade = Grade::orderBy('score', 'DESC')->get();
        // $title = $quizz->title;
        // $instruction = $quizz->instruction;
        // $file = $quizz->file;
        // $score = $quizz->score;
        // $id = $quizz->id;
        // $sub_id = $quizz->subject_id;
        // $created_at = $quizz->created_at;
        // $link = $quizz->url;
        // foreach ($grade as $grades) {
        //     $my_grade = $grades->hasGrade->score;
        // }
        $answer = Answer::with('hasGrade')->where('subject_id', $quizz->subject_id)->get();
        dd($answer);
        // return view('teacher.turn', compact('class', 'id', 'sub_id', 'created_at', 'title', 'score', 'instruction', 'file', 'link', 'quiz'));
    }
}

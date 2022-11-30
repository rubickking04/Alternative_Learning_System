<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Grade;
use App\Models\Answer;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherClass $teachClass, Quiz $quizz, Answer $ans)
    {
        $class = TeacherClass::where('teacher_id', '=', Auth::guard('teacher')->user()->id)->latest()->get();
        $quiz = Answer::with('hasGrade')->where('subject_id', $quizz->subject_id)->where('quiz_id', $quizz->id)->latest()->get();
        $hasGrade = Quiz::with('hasGrade')->where('subject_id', $quizz->subject_id)->get();
        // $grade = Grade::orderBy('score', 'DESC')->where('subject_id', $quizz->subject_id)->where('quiz_id', $quizz->id)->get();
        $grade = Grade::orderBy('score', 'DESC')->with('students', 'subjects', 'teachers', 'quizzes', 'answers')->where('subject_id', $quizz->subject_id)->where('quiz_id', $quizz->id)->get();
        $title = $quizz->title;
        $instruction = $quizz->instruction;
        $file = $quizz->file;
        $score = $quizz->score;
        $id = $quizz->id;
        $sub_id = $quizz->subject_id;
        $created_at = $quizz->created_at;
        $link = $quizz->url;
        // foreach ($grade as $grades) {
        //     $my_grade = $grades->hasGrade->score;
        // }
        // dd($grade);
        return view('teacher.quizzes', compact('class', 'id', 'sub_id', 'created_at', 'title', 'score', 'instruction', 'file', 'link', 'quiz', 'grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hello = Answer::find($id)->delete();
        return back();
    }
}

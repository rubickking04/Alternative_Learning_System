<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use App\Models\StudentClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherClass $teachClass)
    {
        // dd('welcome');
        $class = TeacherClass::where('teacher_id', '=', Auth::guard('teacher')->user()->id)->latest()->get();
        $sub = collect($teachClass)->first();
        $classs = TeacherClass::where('id', $sub)->latest()->get();
        $quiz = Quiz::where('subject_id', $sub)->where('teacher_id', '=', Auth::guard('teacher')->user()->id)->latest()->get();
        $less = Auth::guard('teacher')->user()->name;
        $uuid = $teachClass->uuid;
        $subject = $teachClass->subject;
        $description = $teachClass->description;
        $section = $teachClass->section;
        $id = $teachClass->id;
        $year = $teachClass->yearLevel;
        // dd($teachClass->hasQuizzes);
        return view('teacher.class', compact('class', 'classs', 'less', 'uuid', 'subject', 'description', 'section', 'id', 'year', 'quiz'));
    }
}

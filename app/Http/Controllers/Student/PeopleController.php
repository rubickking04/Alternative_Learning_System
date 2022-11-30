<?php

namespace App\Http\Controllers\Student;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    public function index(StudentClass $studClass)
    {
        $class = StudentClass::where('user_id', '=', Auth::user()->id)->latest()->get();
        $classs = StudentClass::with('student')->where('subject_id', '=', $studClass->subject_id)->latest()->get();
        $less = $studClass->teachers->name;
        $teach = $studClass->teachers->image;
        $uuid = $studClass->uuid;
        $subject = $studClass->subject;
        $description = $studClass->description;
        $section = $studClass->section;
        $id = $studClass->id;
        $year = $studClass->yearLevel;
        // dd($studClass);
        return view('student.classmate', compact('class', 'classs', 'less',  'teach', 'uuid', 'subject', 'description', 'section', 'id', 'year'));
    }
}

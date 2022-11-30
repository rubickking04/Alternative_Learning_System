<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Quiz;
use App\Models\StudentClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Test;

class ClassworkController extends Controller
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
        $ids = collect($teachClass)->first();
        $classs = TeacherClass::where('id', $ids)->latest()->get();
        $quiz = Quiz::where('subject_id', $ids)->where('teacher_id', '=', Auth::guard('teacher')->user()->id)->latest()->get();
        $less = Auth::guard('teacher')->user()->name;
        $uuid = $teachClass->uuid;
        $subject = $teachClass->subject;
        $description = $teachClass->description;
        $section = $teachClass->section;
        $id = $teachClass->id;
        $year = $teachClass->yearLevel;
        // dd($quiz);
        return view('teacher.work', compact('class', 'classs', 'less', 'uuid', 'subject', 'description', 'section', 'id', 'ids', 'year', 'quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherClass $teachClass, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'score' => 'required|string|max:50',
            'instruction' => 'required|string|max:50',
            'url' => 'nullable|url|max:255',
        ]);
        $subject = TeacherClass::where('id', $teachClass->id)->first();
        $quiz = Quiz::create([
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'subject_id' => $subject->id,
            'title' => $request->input('title'),
            'score' => $request->input('score'),
            'instruction' => $request->input('instruction'),
            'url' => $request->input('url'),
        ]);
        // dd($subject->id);
        return back();
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
        $quiz = Quiz::find($id)->delete();
        return back();
    }
}

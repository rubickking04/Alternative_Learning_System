<?php

namespace App\Http\Controllers\Teacher;

use App\Models\StudentClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherClass $teachClass)
    {
        $class = TeacherClass::where('teacher_id', '=', Auth::user()->id)->latest()->get();
        $sub = collect($teachClass)->first();
        $classs = StudentClass::with('student')->where('subject_id', $sub)->latest()->get();
        $uuid = $teachClass->uuid;
        $subject = $teachClass->subject;
        $description = $teachClass->description;
        $section = $teachClass->section;
        $id = $teachClass->id;
        $year = $teachClass->yearLevel;
        // dd($teachClass->uuid);
        return view('teacher.students', compact('class', 'classs', 'uuid', 'subject', 'description', 'section', 'id', 'year'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hello = StudentClass::find($id)->forceDelete();
        return back();
    }
}

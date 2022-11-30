<?php

namespace App\Http\Controllers\Student;

use App\Models\StudentClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JoinClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'uuid' => 'required|uuid',
        ]);
        $class = TeacherClass::where('uuid', $request->uuid)->first();
        if ($class === null) {
            return back()->with('msg', 'This Class Code doesn\'t exists anymore');
        } elseif ($class->exists()) {
            if (StudentClass::withTrashed()->where('user_id', Auth::user()->id)->where('subject_id', $class->id)->exists()) {
                return back()->with('msg', 'This Class Code already exists');
            } else {
                $lesson = StudentClass::create([
                    'user_id' => Auth::user()->id,
                    'subject_id' => $class->id,
                    'teacher_id' => $class->teacher_id,
                    'uuid' => $class->uuid,
                    'description' => $class->description,
                    'subject' => $class->subject,
                    'yearLevel' => $class->yearLevel,
                    'semester' => $class->semester,
                    'section' => $class->section,
                ]);
                // Alert::toast('New Class Added!', 'success');
                return redirect('/home');
            }
        }
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
        //
    }
}

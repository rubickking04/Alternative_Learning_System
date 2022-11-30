<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
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
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
        ]);
        $user = User::find($id);
        $grade = Grade::create([
            'user_id' => $user->id,
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'subject_id' => $request->input('subject_id'),
            'quiz_id' => $request->input('quiz_id'),
            'answer_id' => $request->input('answer_id'),
            'score' => $request->input('score')
        ]);
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
        //
    }
}

<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Str;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CreateClassesController extends Controller
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
            'description' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'yearLevel' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);
        $class = TeacherClass::create([
            'uuid' => Str::uuid()->toString(),
            'teacher_id' => Auth::user()->id,
            'subject' => $request->input('subject'),
            'semester' => $request->input('semester'),
            'section' => $request->input('section'),
            'yearLevel' => $request->input('yearLevel'),
            'description' => $request->input('description'),
        ]);
        // Alert::toast('Successfully Created!', 'success');
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

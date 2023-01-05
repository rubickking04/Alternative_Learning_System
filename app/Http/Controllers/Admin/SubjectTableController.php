<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudentClass;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Query\Builder;

class SubjectTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeacherClass $subjects)
    {
        $subject = TeacherClass::latest()->paginate(5);
        $sub = collect($subjects)->first();
        $subs = StudentClass::with('student','grades')->where('subject_id', $sub)->get();
        return view('admin.subjects_table', compact('subs','subject'));
    }

    /**
     * Search the specified resource from TeacherClasses table.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $subject= TeacherClass::where('subject','LIKE','%'.$search.'%')->orWhere('section','LIKE','%'.$search.'%')->orWhere('yearLevel','LIKE','%'.$search.'%')
        ->orWhereHas('teacher', function (Builder $query) use ($search)
        {
            $query->where('name','LIKE','%'.$search.'%');
        })->paginate(10);
        if(count($subject)>0)
        {
            return view('admin.subjects_table', compact('subject'));
        }
        else{
            return back()->with('msg', 'We couldn\'t find "'.$search.'" on this page.' );
        }
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
        $subject = TeacherClass::where('id', $id)->first()->delete();
        return back()->with('message', 'Subject removed successfully.');
    }
}

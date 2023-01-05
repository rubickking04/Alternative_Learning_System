<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::latest()->paginate(10);
        return view('admin.teachers_table', compact('teacher'));
    }

    /**
     * Search the specified resource from Teachers Table.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->input('search');
        $teacher = Teacher::where('name','LIKE','%'.$search.'%')->orWhere ('email','LIKE','%'.$search.'%')->paginate(10);
        if (count($teacher)>0){
            return view('admin.teachers_table',compact('teacher'));
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
        $request->validate([
            'name' =>'required|string',
            'email'=>'required|email|string|max:255',
        ]);
        $user= Teacher::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('message', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id)->delete();
        return back()->with('message','User remove successfully.');
    }
}

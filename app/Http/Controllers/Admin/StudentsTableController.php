<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->paginate(5);
        return view('admin.students_table', compact('user'));
    }

    /**
     * Search the specified resource from Users Table.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $user = User::where('name','LIKE','%'.$search.'%')->orWhere ('email','LIKE','%'.$search.'%')->paginate(10);
        if (count($user)>0){
            return view('admin.students_table',compact('user'));
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
        $user= User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('message', 'Data updated successfully.');
            // dd($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return back()->with('message', 'User removed successfully.');
    }
}

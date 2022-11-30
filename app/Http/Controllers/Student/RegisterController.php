<?php

namespace App\Http\Controllers\Student;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.register');
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
            'name' => 'required|string|max:50',
            'email' => 'required|unique:users|email',
            // 'username' => 'required|string|max:50',
            // 'address' => 'required|string|max:255',
            // 'phone' => 'required|string|max:255',
            'password' => 'required|confirmed|min:8',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            // 'username' => $request->input('username'),
            'email' => $request->input('email'),
            // 'address' => $request->input('address'),
            // 'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);
        // Alert::toast('Welcome, ' . Auth::user()->name, 'success');
        return redirect()->route('student.home');
    }
}

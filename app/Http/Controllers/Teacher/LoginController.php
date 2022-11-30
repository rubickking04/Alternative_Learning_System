<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' =>  'required'
        ]);
        if (auth()->guard('teacher')->attempt($request->only('email', 'password'), $request->remember)) {
            return $this->sendLoginResponse($request);
        }
        return $this->sendMyFailedLoginResponse($request);
    }
    protected function sendMyFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        // Load user from database
        $teacher = \App\Models\Teacher::where($this->username(), $request->{$this->username()})->first();
        if ($teacher && !Hash::check($request->password, $teacher->password)) {
            $errors = ['password' => 'The password is incorrect.'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}

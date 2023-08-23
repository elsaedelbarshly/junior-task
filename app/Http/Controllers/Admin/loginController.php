<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\adminCheckLoginRequest;

class loginController extends Controller
{
     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::Admin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct()
     {
        $this->middleware('guest:admin')->except('logout');
     }
    public function login()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(adminCheckLoginRequest $request)
    {
        if(Auth::guard('admin')->attempt($request->only('email','password')))
        {
            return redirect()->intended($this->redirectTo);
        }
        return redirect()->back()
        ->withInput(['email'=>$request->email])
        ->withErrors(['errorResponse'=>'These credentials do not match our records']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.dashboard.login');
    }
}

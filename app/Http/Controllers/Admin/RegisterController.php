<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\adminRegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function store(adminRegisterRequest $request)
    {
        // dd($request);
        // $adminKey = "123";
        // dd($request);
        if($request->admin_key == "aaa")
       {
        // dd($request);
            $data = $request->except(['password_confirmation','_token','admin_key']);
            $data['password'] = Hash::make($request->password);
            Admin::create($data);
            return redirect()->route('admin.dashboard.login');
       }else{
        return redirect()->back()->with('errorResponse','somesting went wrong');
       }
    }
}

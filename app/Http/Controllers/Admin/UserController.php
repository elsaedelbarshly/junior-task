<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\userRequest;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles =Role::get();
        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(userRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'role_id' => $request->role_id,
        ]);
        return redirect()->route('admin.user.index');
    }
}

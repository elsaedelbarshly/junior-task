<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Traits\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\profileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function show()
    {
        $user = Auth::user();
        return view('user.profile',$user);
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('user.edit',$user);
    }

    public function update($id,profileRequest $request)
    {
        $user = User::where('id',$id)->first();
        $data = $request->except('_token','submit','photo');
        if($request->has('photo'))
        {
            $newPhotoName = Media::upload($request->file('photo'),'users');
            Media::delete("images/users/{$user->photo}");
            $data['photo'] = $newPhotoName;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('user.profile')->with('success','User Updated');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\permissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view(('admin.permission.index'),compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(permissionRequest $request)
    {
        $permission = Permission::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.permission.index');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit',compact('permission'));
    }

    public function update(permissionRequest $request,$id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.permission.index');
    }

    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('admin.permission.index');
    }

}

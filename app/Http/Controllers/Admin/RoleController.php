<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\roleRequest;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view(('admin.role.index'),compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::select('id','name')->get();
        return view('admin.role.create',compact('permissions'));
    }

    public function store(roleRequest $request)
    {
        $role = $this->process(new Role,$request);
        if($role)
        {
            return redirect()->route('admin.role.index')->with(['success'=>'Role Created Succssfuly']);
        }
        return redirect()->route('admin.role.index')->with(['error'=>'Something Wrong Try agine']);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::select('id','name')->get();
        return view('admin.role.edit',compact('role','permissions'));
    }
    public function update($id,roleRequest $request)
    {   $role = Role::findOrFail($id);
        $role = $this->process($role,$request);
        if($role)
        {
            return redirect()->route('admin.role.index')->with(['success'=>'Role Created Succssfuly']);
        }
        return redirect()->route('admin.role.index')->with(['error'=>'Something Wrong Try agine']);
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.role.index');
    }

    public function process(Role $role,Request $request)
    {
        $role->name = $request->name;
        $role->permission = json_encode($request->permission);
        $role->save();
        return $role;
    }
}

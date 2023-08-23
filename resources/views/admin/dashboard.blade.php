@extends('admin.layouts.app')
@section('content')
<h1>
    welcom in your dashbord :{{ Auth::guard('admin')->user()->name }}

    <a href="{{ route('admin.role.index') }}" class="btn btn-outline-warning">Role</a>
    <a href="{{ route('admin.permission.index') }}" class="btn btn-outline-warning">Permission</a>
    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-warning">User</a>
</h1>

@endsection
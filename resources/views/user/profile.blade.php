@extends('user.parent')
@section('title','profile')
@section('content')

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Photo</th>
                <th>Creation</th>
                <th>Operation</th>
                
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($user as $data) --}}
            <tr>
                <td>{{ Auth::user()->id }}</td>
                <td>{{ Auth::user()->name }}</td>
                <td>{{ Auth::user()->phone }}</td>
                <td>{{ Auth::user()->email }}</td>
                <td>{{ Auth::user()->password }}</td>
                <td> 
                    <img src="{{ asset('images/users/') . Auth::user()->image }}" alt="default.png">
                </td>
                <td>{{ Auth::user()->created_at }}</td>
                <td>
                    <a href="{{ route('edit.profile',Auth::user()->id) }}" class="btn btn-outline-warning">Edit</a>
                    {{-- <a href="#" class="btn btn-outline-danger">Delete</a> --}}
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

@endsection

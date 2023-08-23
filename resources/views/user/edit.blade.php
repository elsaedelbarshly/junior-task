@extends('user.parent')
@section('title', 'profile')
@section('content')
    <div class="col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <form method="post" action="{{ route('update.profile', Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{ Auth::user()->name }}">
                            @error('name_en')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" value="{{ Auth::user()->phone }}">
                            @error('name_ar')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="text" Email="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" value="{{ Auth::user()->email }}">
                            @error('name_en')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label for="customFile">Photo <img src="{{ url('/images/users/' . Auth::user()->photo) }}"
                                alt="{{ Auth::user()->name }}" class="w-100" style="cursor: pointer"></label>
                        <input type="file" class="d-none" id="customFile" name="photo">
                        @error('image')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-warning" name="submit" value="index">Update
                        Profile</button>
                </div>
            </form>
        </div>
    </div>
@endsection

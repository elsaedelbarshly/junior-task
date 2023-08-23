@extends('admin.layouts.app')
@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Edit User Role</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <form method="POST" action="{{ route("admin.user.update",$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="col-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" value="{{ $user->name }}">
                        @error('name_en')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    </div>
                    {{-- <div class="col-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" value="{{ $user->phone }}">
                        @error('name_ar')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                    </div> --}}
                </div>
                {{-- <div class="form-row">
                    <div class="col-6">
                        <label for="Email">Email</label>
                        <input type="text" Email="Email" class="form-control @error('Email') is-invalid @enderror"
                            id="Email" value="{{ $user->email }}">
                        @error('name_en')
                            <p class="text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                </div> --}}
            </div>

            <div class="form-row">
                <div class="col-6">
                    <select class="form-select" aria-label="Default select example">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="form-row">
                <div class="col-6">
                    <label for="customFile">Photo <img src="{{ url('/images/users/' . $user->photo) }}"
                            alt="{{ $user->name }}" class="w-100" style="cursor: pointer"></label>
                    <input type="file" class="d-none" id="customFile" name="photo">
                    @error('image')
                        <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
            </div> --}}

            <div class="card-footer">
                <button type="submit" class="btn btn-outline-warning" name="submit" value="index">Update User Role</button>
            </div>
        </form>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection


@extends('layout.main')

@section('content')

<div style="height: 81vh">
    <form action="/signUp/signup" method="post" class="ms-4" enctype="multipart/form-data">
        <h1 class="mb-3">Sign Up</h1>
        @csrf
        <div class="mb-3">
            <label for="text" class="col-1">First Name:</label>
            <input type="text" id="first_name" name="first_name" >
            <div class="col-2">
                @error('first_name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="col-1">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" >
            <div class="col-2">
                @error('middle_name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="col-1">Last Name:</label>
            <input type="text" id="last_name" name="last_name" >
            <div class="col-2">
                @error('last_name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="col-1">Email:</label>
            <input type="email" id="email" name="email" >
            <div class="col-2">
                @error('email')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="d-flex">
            <label for="text" class="col-1">Gender:</label>
            <div class="me-3">
                <input type="radio" id="gender" name="gender" value="Male">
                <label for="gender">Male</label>
            </div>
            <div class="ms-3">
                <input type="radio" id="gender" name="gender" value="Female">
                <label for="gender">Female</label>
            </div>
        </div>
        <div class="mb-3 col-2">
            @error('gender')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="col-1">Role:</label>
            <select id="role" name="role">
                <option value="" selected disabled hidden></option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <div class="col-2">
                @error('role')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="text" class="col-1">Password:</label>
            <input type="password" id="password" name="password" >
            <div class="col-2">
                @error('password')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="display" class="col-1">Display Picture:</label>
            <input type="file" id="file" name="file" >
            <div class="col-2">
                @error('file')
                {{$message}}
                @enderror
            </div>
        </div>
        <button name="submit" type="submit">Submit</button>
    </form>
    <a href="/login" class="m-3">already have an account? click here to log in</a>
    @if(session()->has('message'))
    <div class="alert alert-success m-3">
        {{ session()->get('message') }}
    </div>
    @endif

</div>


@endsection
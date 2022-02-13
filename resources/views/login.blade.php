@extends('layout.main')

@section('content')

<div style="height: 81vh">
    <form action="/login/login" method="post" class="ms-4" enctype="multipart/form-data">
        <h1 class="mb-3">Log in</h1>
        @csrf
        <div class="mb-3">
            <label for="text" class="col-1">Email:</label>
            <input type="text" id="email" name="email" >
        </div>
        <div class="mb-3">
            <label for="text" class="col-1">Password:</label>
            <input type="password" id="password" name="password" >
        </div>
        <button name="submit" type="submit">Submit</button>
    </form>
    <a href="/signUp" class="m-3">don't have an account? click here to sign up</a>
    @if(session()->has('message'))
    <div class="alert alert-danger m-3">
        {{ session()->get('message') }}
    </div>
    @endif

</div>


@endsection
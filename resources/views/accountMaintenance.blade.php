@extends('layout.main')


@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Account</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($account as $a)
        <tr>
            <td>{{$a->first_name.' '.$a->middle_name.' '.$a->last_name.' - '.$a->role->role_desc}}</td>
            <td>
                <a href="/updateRole/{{$a->id}}" class="me-5">Update Role</a>
                <a href="/delete/{{$a->id}}">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
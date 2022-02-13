@extends('layout.main')


@section('content')

<div style="margin:50px">
    <form action="/updateRole/update/{{$account->id}}" method="post" class="ms-4">
        @csrf
        <h3>{{$account->first_name.' '.$account->middle_name.' '.$account->last_name}}</h3>
        <div class="mb-3">  
            <label for="role" class="col-1">Role:</label>
            <select id="role" name="role">
                @if($account->role_id==1)
                    <option value="Admin" selected="selected">Admin</option>
                    <option value="User">User</option>
                @else
                    <option value="Admin">Admin</option>
                    <option value="User" selected="selected">User</option>
                @endif
            </select>
        </div>
        <button name="submit" type="submit">Save</button>
    </form>
</div>
    


@endsection
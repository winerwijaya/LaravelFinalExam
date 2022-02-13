@extends('layout.main')


@section('content')

<table class="table caption-top">
    <caption>List of ebooks</caption>
    <thead>
        <tr>
        
            <th scope="col">Author</th>
            <th scope="col">Title</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ebook as $e)
        <tr>
            <td>{{$e->author}}</td>
            <td>
                <a href="/ebook/{{$e->ebook_id}}">{{$e->title}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
@extends('layout.main')



@section('content')


<div style="margin:50px">
    <h3>E-Book Detail</h3>
    <div class="d-flex">
        <p class="col-1">Title</p>
        <p class="col-2">{{$ebook->title}}</p>
    </div>
    <div class="d-flex">
        <p class="col-1">Author</p>
        <p class="col-2">{{$ebook->author}}</p>
    </div>
    <div class="d-flex">
        <p class="col-1">Description</p>
        <p class="col-2">{{$ebook->description}}</p>
    </div>
    <a href="/rent/{{Auth::User()->id}}/{{$ebook->ebook_id}}" role="button" class="btn btn-primary me-3">Rent</a>
</div>



@endsection
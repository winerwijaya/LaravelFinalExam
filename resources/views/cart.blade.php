@extends('layout.main')


@section('content')



<div style="height: 81vh">
  <table class="table">
    <h3>CART</h3>
    <thead>
      <tr>
        @if(!$order->isempty())
        <th scope="col">Title</th>
        <th scope="col"></th>
        @endif
      </tr>
    </thead>
    <tbody>
      
      @if(!$order->isempty())
        @foreach($order as $o)
        <tr>
          <td>{{$o->ebook->title}}</td>
          <td>
            <a href="/deleteCart/{{$o->order_id}}">delete</a>
          </td>
        </tr>
        @endforeach
      @else
        there is no item in cart
      @endif
    </tbody>
  </table>
    @if(!$order->isempty())
    <a href="/submitCart/{{Auth::User()->id}}" role="button" class="btn btn-primary" >Submit</a>
    @endif
</div>
  
  
  @endsection
@extends('layouts.app')

@section('content')


<div class="container">
    <h3>Name: {{$individual->name}}</h3>
    <p>Network: {{$individual->Network}}</p>
    <p>Body: {{$individual->Body}}</p>
    <p>Display: {{$individual->Display}}</p>
    <p>Platform: {{$individual->Platform}}</p>
    <p>Memory: {{$individual->Memory}}</p>
    <p>Sound: {{$individual->Sound}}</p>
    <p>Battery: {{$individual->Battery}}</p>
    <p>MainCamera: {{$individual->MainCamera}}</p>
    <p>SelfieCamera: {{$individual->SelfieCamera}}</p>
    <div class="col-md-12">
        <!-- <a class="read-more" href="/checkout/{{$individual->id}}">Buy now</a> -->
        <a class="read-more" href="{{route('checkout.index')}}">Check Out</a>
        <a class="read-more" href="{{url('/cart/add/')}}/{{$individual->id}}">Add to cart</a>
    </div>
   
</div>

@endsection
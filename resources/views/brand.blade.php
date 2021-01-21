@extends('layouts.app')

@section('content')

<div class="brand_color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Brand</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- brand -->
<div class="brand">
    <div class="container">

    </div>
    <div class="brand-bg">
        <div class="container">
            <div class="row">
                @foreach($brand as $brand)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                    <div class="brand_box">
                        <img src="images/1.png" alt="img" />
                        <h3><strong class="red">{{ $brand->price }}</strong></h3>
                        <span>{{ $brand->name }}</span>
                        <i><img src="images/star.png" /></i>
                        <i><img src="images/star.png" /></i>
                        <i><img src="images/star.png" /></i>
                        <i><img src="images/star.png" /></i></br>
                        <div class="col-md-12">
                            <a class="read-more" href="/individual/{{$brand->id}}">View details</a>
                            <a class="read-more" href="/cart/add/{{$brand->id}}">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12">
                    <a class="read-more">See More</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end brand -->

@endsection
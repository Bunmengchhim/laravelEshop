@extends('layouts.front')

@section('title')
 Welcome to E-Shop
@endsection

@section('content')

@include('layouts.include.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($feater_product as $products )        
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="">
                        <div class="card-body">
                            <span class="float-start">{{$products->name}}</span>
                            <span class="float-end"> {{ $products->selling_price}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
       
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Products</h2>
            <div class="owl-carousel owl-theme">
                @foreach ($trending_product as $products )        
                <div class="item">
                    <a href="{{ url('view-category/'.$products->slug )}}">
                    <div class="card">
                        <img src="{{ asset('assets/uploads/category/'.$products->image)}}" alt="">
                        <div class="card-body">
                            <span class="float-start">{{$products->name}}</span>
                            <span class="float-end"> {{ $products->selling_price}}</span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
       
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection
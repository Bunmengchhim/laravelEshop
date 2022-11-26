@extends('layouts.front')

@section('title')
    Products 
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{ $category->name }}</h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>         
                @foreach ($product as $products )        
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('category/'.$category->name.'/' .$products->slug)}}">
                        <img src="{{ asset('assets/uploads/products/'.$products->image)}}" alt="">
                        <div class="card-body">
                            <span class="float-start">{{$products->name}}</span>
                            <span class="float-end"> {{ $products->selling_price}}</span>
                        </div>
                         </a>
                    </div>
                </div>
                @endforeach     
        </div>
    </div>
</div>

@endsection
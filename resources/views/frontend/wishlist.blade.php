@extends('layouts.front')

@section('title')
 My Cart Page
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a>
            <a href="{{ url('wishlist')}}">Wishlist</a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if ($wishlist->count() > 0)
            @foreach ($wishlist as $item )
            <div class="row product_data p-3">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/' .$item->products->image )}}" width="80px" height="80px" alt="Image Here">
                </div>
                <div class="col-md-3 pt-3">
                    <h3>{{ $item->products->name}}</h3>
                </div>
                <div class="col-md-2 pt-3">
                    <h3>$ {{ $item->products->selling_price}}</h3>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id}}">
                    @if ($item->products->qty >= $item->prod_qty)
                            
                        <h6>In Stock</h6>     
                  
                    @else

                        <h6 class="mt-4">Out of Stock</h6>
    
                    @endif
                </div>
                <div class="col-md-2 pt-3">
                    <button class="btn btn-danger"><i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @endforeach
            @else
                <h4>There are no products in your Wishlist</h4>
            @endif
        </div>
    </div>
</div>


@endsection
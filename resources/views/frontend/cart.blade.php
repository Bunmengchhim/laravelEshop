@extends('layouts.front')

@section('title')
 My Cart Page
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a>
            <a href="{{ url('cart')}}">Cart</a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @php
                $total = 0;
            @endphp
            @foreach ($cartItem as $item )
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
                                
                            <label for="">Quanlity</label>
                            <div class="input-group text-center " style="width:130px">
                                <button class="decrement-btn changeQty" >-</button>
                                <input type="text" class="form-control qty-input text-center" value="{{ $item->prod_qty}}">
                                <button class="increment-btn changeQty" >+</button>
                            </div>
                        @php
                            $total += $item->products->selling_price * $item->prod_qty
                        @endphp

                        @else

                            <h6 class="mt-4">Out of Stock</h6>
        
                        @endif
                    </div>
                    <div class="col-md-2 pt-3">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : $ {{ $total }}</h6>
            <a href="{{ url('checkout')}}" class="btn btn-success float-end">Proceed To Checkout</a>
        </div>
    </div>
</div>


@endsection
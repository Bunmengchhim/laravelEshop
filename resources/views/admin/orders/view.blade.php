@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white" style="font-weight: 800; font-size:1.5rem">Order Detail
                            <a href="{{ url('orders')}}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Shopping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1 }}
                                    {{ $orders->address2 }}
                                    {{ $orders->city }}
                                    {{ $orders->state }}
                                    {{ $orders->country }}
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item )
                                        <td> {{$item->products->name }}</td>
                                        <td> {{$item->qty}}</td>                                  
                                        <td>$ {{$item->price}}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/' .$item->products->image)}}" width="70px" alt="">
                                        </td>
                                                                    
                                       @endforeach 
                                    </tbody>
                                </table>
                                <h4 class="p-2">Grand Total Price :  <span class="float-end">$ {{ $orders->total_price }} </span></h4>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <form action="{{ url('update-order/' .$orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{$orders->status == '0' ? 'selected':''}} value="0">Pendding</option>
                                            <option {{$orders->status == '1' ? 'selected':''}} value="1">Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
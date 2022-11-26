@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')

    <div class="container  mt-3">
        <form action="{{ url('place-order')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" id="firstName" name="fname" placeholder="Enter First Name">
                                    <span id="fname_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}" id="lastName" name="lname" placeholder="Enter Last Name">    
                                </div> 
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control email" value="{{ Auth::user()->email}}" id="email" name="email" placeholder="Enter Email" >
                                </div> 
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" id="phone" name="phone" placeholder="Enter Phone Number" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="Address1">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" id="Address1" name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address2">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" id="Address2" name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control city" value="{{ Auth::user()->city }}" id="City" name="city" placeholder="Enter City"> 
                                </div>
                                <div class="col-md-6">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control state" value="{{ Auth::user()->state}}" id="State" name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control country" value="{{ Auth::user()->country}}" id="Country" name="country" placeholder="Enter Country">
                                </div> 
                                <div class="col-md-6">
                                    <label for="Pin Code">Pin Code</label>
                                    <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" id="Pin Code" name="pincode" placeholder="Enter Pin Code">
                                </div>                                                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItem as $item )

                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>$ {{$item->products->selling_price}}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary w-100 float-end">Place Order</button>
                            <button type="button" class="btn btn-primary w-100 mt-1 btnRazorpay">Payment Razorpay</button>
       
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
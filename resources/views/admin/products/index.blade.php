@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2> Products</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table--striped text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                        <tr> 
                            <td>{{$product->id}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td><img src="{{asset('assets/uploads/products/' .$product->image )}}" alt="Image Here" class="cate-image" </td>
                            <td>
                                <a href="{{url('edit-product/'.$product->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{url('delete-products/'.$product->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
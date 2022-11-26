@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
        
        </div>
        <div class="card-body">
            <form action="{{ url('update-products/'. $products->id)}}" method="POST" enctype="multipart/form-data">
              @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option value="">{{ $products->category->name}}</option>                      
                          </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$products->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" id="" class="form-control" value="{{$products->slug}}">
                    </div>
                    <div class="col-md-12 md-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="5">{{$products->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 md-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" id="" class="form-control" value="{{$products->original_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" name="selling_price" id="" class="form-control" value="{{$products->selling_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" name="tax" id="" class="form-control" value="{{$products->tax}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Qty</label>
                        <input type="number" name="qty" id="" class="form-control" value="{{$products->qty}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input  type="checkbox" name="status" id="" class="" {{$products->status == "1" ? 'checked': '' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input  type="checkbox" name="trending" id="" class="" {{$products->trending == "1" ? 'checked': '' }}>
                    </div>
 
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" name="meta_title" id="" class="form-control" value="{{$products->meta_title}}" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Keywords</label>
                        <input type="text" name="meta_keywords" id="" class="form-control" value="{{$products->meta_keywords}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mete_Description</label>
                        <input type="text" name="meta_description" id="" class="form-control" value="{{$products->meta_description}}">
                    </div>
                    @if ($products->image)

                    <img src="{{ asset('assets/uploads/products/'.$products->image)}}"
                        
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    
     
    </div>
@endsection
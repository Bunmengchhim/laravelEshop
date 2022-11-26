@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Add Product</h1>
        
        </div>
        <div class="card-body">
            <form action="{{ url('insert-products')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" aria-label="Default select example">
                            <option value="">Select a Category</option>
                            @foreach ($category as $item )
                            <option value="{{ $item->id }}"> {{ $item->name}}</option>                             
                            @endforeach                        
                          </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</lab el>
                        <input type="text" name="slug" id="" class="form-control">
                    </div>
                    <div class="col-md-12 md-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 md-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" id="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" name="selling_price" id="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" name="tax" id="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Qty</label>
                        <input type="number" name="qty" id="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input  type="checkbox" name="status" id="" class="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input  type="checkbox" name="trending" id="" class="">
                    </div>
 
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" name="meta_title" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Keywords</label>
                        <input type="text" name="meta_keywords" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mete_Description</label>
                        <input type="text" name="meta_description" id="" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Image</label>
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
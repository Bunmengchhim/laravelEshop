@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category Page</h1>
        
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</lab el>
                        <input type="text" name="slug" id="" class="form-control" value="{{ $category->slug }}">
                    </div>
                    <div class="col-md-12 md-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="5" >{{ $category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input  type="checkbox" name="status" {{$category->status == "1" ? 'checked': '' }} class="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked': '' }} class="">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" name="meta_title" id="" class="form-control" value="{{ $category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Keywords</label>
                        <input type="text" name="meta_keywords" id="" class="form-control" value="{{ $category->meta_keywords}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mete_Description</label>
                        <input type="text" name="meta_description" id="" class="form-control" value="{{ $category->meta_descrip}}">
                    </div>
                    @if ($category->image)

                    <img src="{{ asset('assets/uploads/category/'.$category->image)}}"
                        
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
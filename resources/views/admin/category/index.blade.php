@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Category Page</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table--striped text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories )
                        <tr>
                           
                            <td>{{$categories->id}}</td>
                            <td>{{$categories->name}}</td>
                            <td>{{$categories->description}}</td>
                            <td><img src="{{asset('assets/uploads/category/' .$categories->image )}}" alt="Image Here" class="cate-image" </td>
                            <td>
                                <a href="{{url('edit-category/'.$categories->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{url('delete-pro/'.$categories->id)}}" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
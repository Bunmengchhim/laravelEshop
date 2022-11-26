@extends('layouts.front')

@section('title')
 Welcome to E-Shop
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Category Products</h2>
                <div class="row">
                    @foreach ($category as $items )        
                    <div class="col-md-3 mb-3">
                    <a href="{{ url('view-category/'.$items->slug )}}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$items->image)}}" alt="">
                            <div class="card-body">
                                <h5>{{$items->name}}</h5>
                                <p class="float-end"> {{ $items->description}}</p>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach
                </div>
            </div>         
        </div>
    </div>
</div>



@endsection


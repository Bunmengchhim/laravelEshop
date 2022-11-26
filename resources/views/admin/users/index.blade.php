@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2> Register Users</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table--striped text-center">
                <thead>
                    <tr>
                        <th>Id</th>    
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                        <tr> 
                            <td>{{$user->id}}</td>
                            <td>{{$user->name.' '.$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a href="{{ url('view-users/' .$user->id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     
    </div>
@endsection
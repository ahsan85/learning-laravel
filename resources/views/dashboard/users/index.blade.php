@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Section</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New User</a>

        </div>

    </div>
</div>
@if(!$users->isEmpty())
<div class="table-responsive">
    <table class="table table-striped  " style="table-layout: auto; width: 100%;  ">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th width="12%">Name</th>
                <th>Email</th>
                <th>Profile</th>
                <th>Phone</th>
                <th>City</th>
                <th>Country</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($users as $user)
        <tr>
            <td class="pt-3">{{$user->id}}</td>
            <td class="pt-3"> {{$user->name}}</td>
            <td class="pt-3"> {{$user->email}}</td>
            <td class="pt-2"> <img src="{{asset('storage/'.$user->profile->photo)}}" width="50px" height="50px" style=" border-radius: 10%;"></td>
            <td class="pt-3"> {{$user->profile->phone}}</td>
            <td class="pt-3"> {{$user->profile->city}}</td>
            <td class="pt-3"> {{$user->profile->country->name}}</td>
            @if(!$user->roles->isEmpty()) 
            <td class="pt-3"> {{  $user->roles->implode('name', ', ') }}</td>
            @endif
            <td class="pt-2">
                <div class=" btn-group" role="group">
                    <a href="{{route('users.show',$user->id)}}" role="button" class="btn btn-secondary btn-sm ">View</a>
                    <a role="button" href="{{route('users.edit',$user->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{route('users.destroy',$user->id)}}" method="post" class="btn-group">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-secondary btn-sm">Delete</button></form>

                </div>
            </td>


        </tr>


        @endforeach

    </table>
</div>
@else
<div class="alert alert-info" user="alert">
    No user Exist !
</div>
@endif

@endsection()
@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Section</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Role</a>

        </div>

    </div>
</div>
@if($user)

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-4">
            <img src="{{asset('storage/'.$user->profile->photo)}}" width="300px" height="400px" style=" border-radius: 10%;" alt="" class="img-rounded img-responsive" />
        </div>
        <div class="mt-5">
            <span style="font-size: 20px;"><b>Name : </b>{{$user->name}} </span><br>
            <span style="font-size: 20px;"><b>Email : </b>{{$user->email}} </span><br>
            <span style="font-size: 20px;"><b>Phone : </b>+{{$user->profile->phone}} </span><br>
            <span style="font-size: 20px;"><b>Address : </b>{{$user->profile->city}},{{$user->profile->country->name}} </span><br>
            <span style="font-size: 20px;"><b>Role Assigned To This User : </b>{{  $user->roles->implode('name', ', ') }}</span><br>

        </div>
       
       
    </div>
</div>
@else
<div class="alert alert-info" user="alert">
    No role Exist !
</div>
@endif
@endsection()
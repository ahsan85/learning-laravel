@extends('dashboard.layout')
@section('content')

<form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group ">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group ">
        <label for="FullName">Full Name</label>
        <input type="text" class="form-control" id="FullName" placeholder="Enter Full Name" name="fullname">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="m.ahsanrasheed85@gmail.com" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="+923086106787" name="phone">
    </div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="country">Select Country</label>
            <select id="country" class="form-control" name="country">
                <option selected>Choose...</option>
                @if(!$countries->isEmpty())
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
            </div>
        </div>
       
    </div>
    <div class="form-group ">
            <select class="select-multiple-subject " name="roles[]" multiple="multiple" style="width: 100%" id="role">
                <!-- Computer science -->
               
                @if(!$roles->isEmpty())
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
                @endif
            </select>

            </select>

        </div>
    <div class="form-group">
        <label for="profileImage"></label>
        <input type="file" class="form-control-file custom-file" id="profileImage" name="profileImage">
    </div>
    <button type="submit" class="btn btn-primary">Add New User</button>
</form>


@endsection()
@extends('dashboard.layout')
@section('content')

<form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">
    <div class="form-group ">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" value="{{$user->name}}" name="name">
    </div>
    <div class="form-group ">
        <label for="FullName">Full Name</label>
        <input type="text" class="form-control" id="FullName" value="{{$user->username}}" name="fullname">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" value="{{$user->password}}" name="password">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" value="{{$user->profile->phone}}" name="phone">
    </div>
    <div class="form-row">


        <div class="form-group col-md-6">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" value="{{$user->profile->city}}" name="city">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="country">Select Country</label>
            <select id="country" class="form-control" name="country">
                @if(!$countries->isEmpty())
                    @foreach($countries as $country)
                        <option @if(optional($user->profile->country)->name==$country->name) {{'selected'}} @endif value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

    </div>
    <div class="form-group ">
        <select class="select-multiple-role " name="roles[]" multiple="multiple" style="width: 100%" id="role">
            <!-- Computer science -->


            @if(!$roles->isEmpty())
                @foreach($roles as $role)
                    <option value="{{$role->id}}" @if($user->roles->contains('id',$role->id)) selected @endif >{{$role->name}}</option>
                @endforeach
            @endif
        </select>

        </select>

    </div>

    <div class="form-group">
        <label for="profileImage"></label>
        <img style=" border-radius: 10%;" src="{{asset('storage/'.$user->profile->photo)}}" alt="" srcset="" width="50px" height="60px">
        <input type="file" class="form-control-file custom-file" id="profileImage" name="profileImage">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
</form>


@endsection()
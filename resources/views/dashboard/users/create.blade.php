@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('roles.store')}}">
    @csrf

    <div class="form-group ">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Email">
    </div>
    <div class="form-group ">
        <label for="FullName">Full Name</label>
        <input type="text" class="form-control" id="FullName" placeholder="Password">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="m.ahsanrasheed85@gmail.com">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" placeholder="+923086106787">
    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <label for="country">Select Country</label>
            <select id="country" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="city">Select City</label>
            <select id="city" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="role">Select Role</label>

            <select id="role" class="form-control">
                <option selected>Choose Role</option>
                @foreach($roles as $role)
                <option>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="profileImage"></label>
        <input type="file" class="form-control-file custom-file"  id="profileImage" name="profileImage">
    </div>
    <button type="submit" class="btn btn-primary">Add New User</button>
</form>
@endsection()
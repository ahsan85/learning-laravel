@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('roles.store')}}">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-sm-6">

            <input name="name"type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Enter Role Name">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Add New Role</button>
        </div>
    </div>
</form>
@endsection()
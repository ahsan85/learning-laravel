@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('roles.update',$role->id)}}">
    @csrf
    <input type="hidden" name="_method" value="put">
    <div class="form-row align-items-center">
        <div class="col-sm-6">

            <input name="name"type="text" class="form-control mb-2" id="inlineFormInput" value="{{$role->name}}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Update Role</button>
        </div>
    </div>
</form>
@endsection()
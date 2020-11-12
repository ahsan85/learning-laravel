@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Role Section</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('roles.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Role</a>

        </div>

    </div>
</div>
@if(!$roles->isEmpty())
<div class="table-responsive">
    <table class="table table-bordered" style="table-layout: auto; width: 100%;  " >
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th width="20%">Title</th>
                <th width="20%">Created At</th>
                <th width="20%" >Updated At</th>
                <th width="20%" >Users</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        @foreach($roles as $role)
        <tr >
            <td class="pt-2">{{$role->id}}</td>
            <td class="pt-2"> {{$role->name}}</td>
            <td class="pt-2">{{$role->created_at}}</td>
            <td class="pt-2">{{$role->updated_at}}</td>
            <td></td>
            <td>
                <div class=" btn-group" role="group">
                    <a href="{{route('roles.show',$role->id)}}" role="button" class="btn btn-secondary btn-sm">View</a>
                    <a role="button" href="{{route('roles.edit',$role->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{route('roles.destroy',$role->id)}}" method="post" class="btn-group">
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
<div class="alert alert-info" role="alert">
  No role Exist !
</div>
@endif
@endsection()
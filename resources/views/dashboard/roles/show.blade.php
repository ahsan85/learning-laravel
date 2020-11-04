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
@if($role)
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Users</th>
                <th>Action</th>
            </tr>
        </thead>
       
        <tr >
            <td class="pt-3">{{$role->id}}</td>
            <td class="pt-3"> {{$role->name}}</td>
            <td class="pt-3">{{$role->created_at}}</td>
            <td class="pt-3">{{$role->updated_at}}</td>
            <td></td>
            <td>
                <div class=" btn-sm col-sm-10 row" role="group">
                    <a href="{{route('roles.show',$role->id)}}" role="button" class="btn btn-secondary ">View</a>
                    <a role="button" href="{{route('roles.edit',$role->id)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('roles.destroy',$role->id)}}" method="">
                        @csrf 
                        @method("DELETE")
                        <button type="submit" class="btn btn-secondary">Delete</button></form>
                    
                </div>
            </td>

        </tr>


      

    </table>
</div>
@else
<div class="alert alert-info" role="alert">
  No role Exist !
</div>
@endif
@endsection()
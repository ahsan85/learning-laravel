@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category Section</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New category</a>

        </div>

    </div>
</div>

@if(!$categories->isEmpty())
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumbnail</th>
                <th>Children</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($categories as $category)
        <tr>
            <td class="pt-3">{{$category->id}}</td>
            <td class="pt-3"> {{$category->title}}</td>
            <td class="pt-3"> {{$category->content}}</td>
            <td class="pt-2"> <img src="{{asset('storage/'.$category->thumbnail)}}" width="50px" height="50px"></td>
            @if(($category->children)->isEmpty())
            <td class="pt-3">N/A</td>
            @endif
            @if($category->children)
            @foreach($category->children as $child)
            <td class="pt-3"> {{$child->title}}</td>
            @endforeach
            @endif
            <td class="pt-3">{{$category->created_at}}</td>
            <td class="pt-3">{{$category->updated_at}}</td>
            <td class="pt-2">
                <div class=" btn-sm col-sm  row" role="group">
                    <a href="{{route('categories.show',$category->id)}}" category="button" class="btn btn-secondary ">View</a>
                    <a category="button" href="{{route('categories.edit',$category->id)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-secondary">Delete</button></form>

                </div>
            </td>


        </tr>


        @endforeach

    </table>
</div>
@else
<div class="alert alert-info" category="alert">
    No category Exist !
</div>
@endif

@endsection()
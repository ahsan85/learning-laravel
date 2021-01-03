@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Section</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Add New Post</a>

        </div>

    </div>
</div>
@if(!$posts->isEmpty())
<div class="table-responsive">
    <table class="table table-striped" style="table-layout: auto; width: 100%;">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($posts as $post)
        <tr>
            <td class="pt-3">{{$post->id}}</td>
            <td class="pt-3"> {{$post->title}}</td>
            @if($post->thumbnail!==null)
            <td class="pt-2"> <img src="{{asset('storage/'.$post->thumbnail)}}" width="50px" height="50px" style=" border-radius: 10%;"></td>
            @else
            <td class="pt-1"> <img src="{{asset('storage/posts/no_image.jpg')}}" width="50px" height="50px" style=" border-radius: 10%;"></td>

            @endif

            <td class="pt-3"> {{$post->created_at}}</td>
            <td class="pt-3"> {{$post->updated_at}}</td>

            @if(!$post->categories->isEmpty())
            <td class="pt-3"> {{ $post->categories->implode('title', ', ') }}</td>
            @else
             <td class="pt-3">N/A</td>
             @endif
            <td class="pt-3">
                <div class="  col-xm btn-group " role="group">
                    <a href="{{route('posts.show',$post->id)}}" role="button" class="btn btn-secondary   btn-sm">View</a>
                    @can("isAllowed",$post->user->id)
                    <a role="button" href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary  btn-sm">Edit</a>
                    <form action="{{route('posts.destroy',$post->id)}}" method="post" class="btn-group">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-secondary  btn-sm ">Delete</button></form>
                    @endcan

                </div>
            </td>



        </tr>


        @endforeach

    </table>
</div>
@else
<div class="alert alert-info" post="alert">
    No post Exist !
</div>
@endif


@endsection()

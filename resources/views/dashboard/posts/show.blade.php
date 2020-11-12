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

<div class="table-responsive">
    <table class="table table-striped table-sm">
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

        <tr>
            <td class="pt-3">{{$post->id}}</td>
            <td class="pt-3"> {{$post->title}}</td>
            @if($post->thumbnail!==null)
            <td class="pt-1"> <img src="{{asset('storage/'.$post->thumbnail)}}" width="50px" height="50px" style=" border-radius: 10%;"></td>
            @else
            <td class="pt-1"> <img src="{{asset('storage/posts/no_image.jpg')}}" width="50px" height="50px" style=" border-radius: 10%;"></td>

            @endif

            <td class="pt-3"> {{$post->created_at}}</td>
            <td class="pt-3"> {{$post->updated_at}}</td>

            @if(!$post->categories->isEmpty())
            <td class="pt-3"> {{ $post->categories->implode('title', ', ') }}</td>
            @endif
            <td class="pt-3">
                <div class="  col-xm btn-group " role="group">
                    <a role="button" href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary  btn-sm">Edit</a>
                    <form action="{{route('posts.destroy',$post->id)}}" method="post" class="btn-group">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-secondary  btn-sm ">Delete</button></form>

                </div>
            </td>

        </tr>

    </table>
    <div>
        <p><b>Contnet</b></p>


        <p>
            {!!$post->content!!}
        </p>
    </div>
</div>



@endsection()

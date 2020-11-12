@extends('dashboard.layout')
@section('content')

<form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="inputTitle">post</label>
        <input type="title" class="form-control" id="inputTitle" name="title" value="{{$post->title}}">
    </div>

    <div class="form-group">
        <label for="contentDescription">post Description</label>
        <textarea class="form-control tinymce-editor" id="content" rows="3" name="content">{!!$post->content!!}</textarea>
    </div>

    <div class="form-group">
        @if($post->thumbnail!==null)
        <img src="{{asset('storage/'.$post->thumbnail)}}" width="50px" height="50px" style=" border-radius: 10%;">
        @else
        <img src="{{asset('storage/posts/no_image.jpg')}}" width="50px" height="50px" style=" border-radius: 10%;">
        @endif
        <input type="file" class="form-control-file" id="thumbnailFile" name="thumbnail">

    </div>
    <div class="form-group ">
        <select class="select-multiple-categories" name="categories[]" multiple="multiple" style="width: 100%" id="categories">
            <!-- Computer science -->

            @if(!$categories->isEmpty())
            @foreach($categories as $category)
            <option value="{{$category->id}}" @if($post->categories->contains('id',$category->id)) selected @endif>{{$category->title}}</option>
    @endforeach
    @endif
    </select>

    </select>

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2 mt-5">Update post</button>
    </div>

</form>
@endsection()

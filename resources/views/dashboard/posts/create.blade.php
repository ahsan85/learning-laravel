@extends('dashboard.layout')
@section('content')

<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="inputTitle">Post Title</label>
        <input type="title" class="form-control" id="inputTitle" name="title" placeholder="Enter post Title">
    </div>

    <div class="form-group">
        <label for="contentDescription">Post Description</label>
        <textarea class="form-control tinymce-editor" id="content" rows="3" name="content"></textarea>
    </div>

    <div class="form-group">
        <input type="file" class="form-control-file" id="thumbnailFile" name="thumbnail">
    </div>
    <div class="form-group ">
        <select class="select-multiple-categories" name="categories[]" multiple="multiple" style="width: 100%" id="categories">
            <!-- Computer science -->

            @if(!$categories->isEmpty())
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            @endif
        </select>

        </select>

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2 mt-5">Add New post</button>
    </div>

</form>
@endsection()

@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
        <label for="inputTitle">Category</label>
        <input type="title" class="form-control" id="inputTitle" name="title" value="{{$category->title}}">
    </div>

    <div class="form-group">
        <label for="contentDescription">Category Description</label>
        <textarea class="form-control" id="contentDescription" rows="3" name="content">{{$category->content}}</textarea>
    </div>
    <div class="form-group">
        <img src="{{asset('storage/'.$category->thumbnail)}}" alt="" srcset="" width="50px" height="50px">
        <input type="file" class="form-control-file" id="thumbnailFile" name="thumbnail">
    </div>
    <select class="form-control form-control col-sm-4" name="parent_id">
        <option value="">Select A Parent Category</option>
        @if(!$categories->isEmpty())
        @foreach($categories as $cat)
        @if(isset($category->parent) && $category->parent->id==$cat->id)
        <option selected value="{{ $cat->id }}">{{$cat->title}}</option>
        @else
        <option value="{{ $cat->id }}">{{$cat->title}}</option>
        @endif
        @endforeach
        @endif
    </select>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2 mt-5">Update Category</button>
    </div>

</form>
@endsection()
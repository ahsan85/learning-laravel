@extends('dashboard.layout')
@section('content')
<form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="inputTitle">Category</label>
        <input type="title" class="form-control" id="inputTitle" name="title" placeholder="Enter Category Title">
    </div>

    <div class="form-group">
        <label for="contentDescription">Category Description</label>
        <textarea class="form-control" id="contentDescription" rows="3" name="content"></textarea>
    </div>
    <div class="form-group">
        <input type="file" class="form-control-file" id="thumbnailFile" name="thumbnail">
    </div>
    <select class="form-control form-control col-sm-4" name="parent_id">
        <option value="0">Select A Parent Category</option>
        @if(!$categories->isEmpty())
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
        @endif
    </select>

    <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2 mt-5">Add New Category</button>
    </div>

</form>
@endsection()
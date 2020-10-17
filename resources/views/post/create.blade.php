<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
</head>

<body>

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->


    <?php
    if (Session::has('message')) {
        echo Session::get('message');
    }



    ?>
    <h5>Create New Post</h5>
    <form action="<?php echo route('post.store') ?>" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" id="">
        @error('title')
        <div>{{$message}}</div>
        @enderror
        <input type="text" name="conent" id="">
        @error('content')
        <div>{{$message}}</div>
        @enderror
        <br>
        <label for="Computer">
            Computer
            <input type="checkbox" name="check[]" id="" value="cs">
        </label><br>
        <label for="Math">Math
            <input type="checkbox" name="check[]" id="" value="mth">
        </label><br>
        <label for="Physics">Physics
            <input type="checkbox" name="check[]" id="" value="phy">
        </label><br>
        <label for="Bio">Bio
            <input type="checkbox" name="check[]" id="" value="bio">
        </label>
        @error('check')
        <div>{{$message}}</div>
        @enderror
        <br>
        <label for="">Upload an image<input type="file" name="photo" id=""></label>
        @error('photo')
        <div>{{$message}}</div>
        @enderror

        <br>
        <label for="">Website<input type="url" name="website" id=""></label>
        @error('website')
        <div>{{$message}}</div>
        @enderror

        <br>
        <label for="">Start Date<input type="date" name="sdt" id=""></label>
        @error('sdt')
        <div>{{$message}}</div>
        @enderror
         <br>
        <label for="">End Date<input type="date" name="edt" id=""></label>
        @error('edt')
        <div>{{$message}}</div>
        @enderror

        <br>
        <lable>Select TOS<input type="checkbox" name="tos" id=""></lable>
        @error('tos')
        <div>{{$message}}</div>
        @enderror
        <br><br>
        <input type="submit" value="Add New Post">
    </form>
</body>

</html>
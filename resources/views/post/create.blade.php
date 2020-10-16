<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
</head>

<body>
    <h5>Create New Post</h5>
    <form action="<?php echo route('post.store') ?>" method="post">
        @csrf
        <input type="text" name="title" id="">
        <input type="text" name="conent" id="">


        <label for="Computer">
            Computer
            <input type="checkbox" name="check[]" id="" value="cs">
        </label>
        <label for="Math">Math
            <input type="checkbox" name="check[]" id="" value="mth">
        </label>
        <label for="Physics">Physics
            <input type="checkbox" name="check[]" id="" value="phy">
        </label>
        <label for="Bio">Bio
            <input type="checkbox" name="check[]" id="" value="bio">
        </label>

        <input type="submit" value="Add New Post">
    </form>
</body>

</html>
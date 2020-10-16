<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> show post</title>
</head>

<body>
    <?php foreach ($data as $row) { ?>
        <p>{{$row['name']}}</p>
        <p>{{$row['company']}}</p>
    <?php }  ?>

      

</body>

</html>
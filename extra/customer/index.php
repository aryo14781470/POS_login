<?php require "session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type="button" class="btn btn-light"><a href="../logout-user.php">Logout</a></button>
    <p>Hello <?=$username?> Anda Sebagai <?=$name_level?></p>
</body>
</html>
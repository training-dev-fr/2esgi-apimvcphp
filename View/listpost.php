<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/listuser.css">
</head>

<body>
    <div class="userlist">
        <?php foreach ($posts as $post) { ?>
            <div class="user">
                <h1><div class="firstname"><?= $post->name; ?></div></h1>
                <p><div class="lastname"><?= $post->content; ?></div></p>
                <p><div class="birthday"><?= $post->date; ?></div></p>
            </div>
        <?php } ?>
    </div>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Include</title>

</head>

<body>

    <?php

    $hi = 'Hello';

    require __DIR__ . '/parts/table01.php'; //insert php檔案至php檔案

    ?>

</body>

</html>
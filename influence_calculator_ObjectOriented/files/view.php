<?php
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/connection.php");
require_once(__DIR__ . "/functions.php");
$data = all_profile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($data as $key => $value) : ?>
                <div class="col-sm-12 mt-5">
                    <img class="img-fluid w-25" src="uploads/<?= $value['files'] ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
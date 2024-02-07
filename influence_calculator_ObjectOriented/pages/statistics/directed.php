<?php
require_once(__DIR__ . "/../../library/functions.php");
require_once(__DIR__ . "/../../config/session.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h5>class boundary</h5>
            </div>
            <div class="col-3">
                <h5>class mark</h5>
            </div>
            <div class="col-3">
                <h5>fx</h5>
            </div>
            <div class="col-3">
                <h5>Total frequency</h5>
            </div>
        </div>
        <?php if (isset($_SESSION['success'])) : ?>
            <?= $_SESSION['success'] ?>
        <?php endif ?>

    </div>
</body>

</html>
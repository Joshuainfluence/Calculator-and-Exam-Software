<?php
require_once(__DIR__ . "/../../config/dbh.php");
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../../public/profile.classes.php";
require_once __DIR__ . "/../../public/profile.contr.php";
$userid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">

    <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>
<body>
    <button class="btn btn-outline-primary">Check result</button>
</body>
</html>
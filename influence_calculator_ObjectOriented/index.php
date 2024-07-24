<?php
require_once __DIR__ . "/config/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="assets/animation.css">
    <link rel="stylesheet" href="assets/media.css">
    <!-- <link rel="stylesheet" href="assets/nav.css"> -->
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                9D6B15DC5
            </div>
            <button id="menu-btn" class="hamburger">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>

            </button>
            <div class="tabs">
                <button id="theme"><i class="fa fa-sun-o"></i></button>
                <style>

                </style>
                <ul class="hide">
                    <li>
                        <a href="">Home</a>
                        <!-- </li> -->
                    <li>
                        <a href="">
                            Content
                        </a>
                    </li>
                    <li>
                        <a href="">About</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                    <li>
                        <a href="">Blog</a>
                    </li>
                    <li>
                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>
                            <a href="config/logout.php" class="registerBtn">Logout</a>

                        <?php
                        } else {
                        ?>
                            <a href="pages/registration/login.php" class="registerBtn">Register</a>

                        <?php

                        }
                        ?>


                    </li>
                </ul>

            </div>

        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <div class="wrap">
                    <a href="pages/density/density.php" class="density">Density</a>
                </div>
                <div class="wrap">
                    <a href="pages/quadratic/quadratic.php" class="quadratic">Quadratic</a>
                </div>
                <div class="wrap">
                    <a href="" class="scientific">Calculator</a>
                </div>
                <div class="wrap">
                    <a href="pages/statistics/index.php" class="statistics">statistics</a>
                </div>
                <div class="wrap">
                    <a href="" class="pythagoras">Pythagoras</a>
                </div>
                <div class="wrap">
                    <a href="pages/exam/examlogin.php" class="exam">Exam</a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/nav2.js"></script>
</body>

</html>
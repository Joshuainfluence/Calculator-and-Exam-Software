<?php
require_once __DIR__ . "/../config/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/nav.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
    <!-- <link rel="stylesheet" href="../pages/density/style.css"> -->

    <script src="../../assets/nav.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="quadratic.css">
    <link rel="stylesheet" href="../../assets/home.css">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-QQgIkRHu+Hgj4yV9z6k6KNlVBd6BZ/4iMf5gsGt74/KU9iXylugz6NT0P7/4Lo1uyzddq8DPKfo4FJwGc3lmZA==" crossorigin="anonymous"></script>
</head>

<body>
    <header class="primary-header">
        <nav>
            <div class="container">
                <div class="nav-content">
                    <div class="logo">
                        <!-- <img src="image/hacker2.jpg" class="image" alt=""> -->
                        <div class="title">Influence Calculator</div>
                    </div>
                    <button class="mobile-nav-toggle" aria-expanded="false" aria-controls=".content"></button>
                    <div class="content">
                        <ul class="content1" id="content" data-visible="false">
                            <li>
                                <a href="../../index.php">Home</a>
                            </li>
                            <li>
                                <a href="">Contents</a>
                            </li>
                            <li>
                                <a href="../about/about.php">About</a>
                            </li>
                            <li>
                                <a href="../contact/contact.php">Contact</a>
                            </li>
                            <li>
                                <?php
                                if (isset($_SESSION['id'])) {
                                ?>
                                    <a href="../profile/profile.php"><i class="fa fa-user-circle"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="../registration/login.php">Register <i class="fa fa-sign-in"></i></a>
                                <?php
                                }

                                ?>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
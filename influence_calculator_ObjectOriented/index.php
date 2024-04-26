<?php
require_once __DIR__ . "/config/session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Influence</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/animation.css">
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="assets/media_query.css">
    <!-- <script src="nav.js" defer></script> -->
    <script src="assets/nav.js" defer></script>
</head>

<body>
    <header class="primary-header shadow">
        <nav>
            <div class="container">
                <div class="nav-content">
                    <div class="logo">
                        <!-- <img src="image/hacker2.jpg" class="image" alt=""> -->
                        <div class="title">InfluenceTechie</div>
                    </div>
                    <button class="mobile-nav-toggle" aria-expanded="false" aria-controls=".content">
                        <span class="hamburger-top" aria-expanded="false"></span>
                        <span class="hamburger-middle"aria-expanded="true"></span>
                        <span class="hamburger-bottom"aria-expanded="true"></span>
                    </button>
                    <div class="content">
                        <ul class="content1" id="content" data-visible="false">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="">Contents</a>
                            </li>
                            <li>
                                <a href="pages/about/about.php">About</a>
                            </li>
                            <li>
                                <a href="pages/contact/contact.php">Contact</a>
                            </li>
                            <li class="user" data-visible="false">
                                <?php
                                if (isset($_SESSION['id'])) {
                                ?>
                                    <a href="pages/profile/profile.php"><i class="fa fa-user-circle"></i></a>
                                    <!-- <div class="it"><?php echo ucfirst($_SESSION['username']) ?></div> -->
                                    <a href="config/logout.php">Logout <i class="fa fa-sign-in"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="pages/registration/login.php">Register <i class="fa fa-sign-in"></i></a>
                                <?php
                                }

                                ?>
                            </li>
                            <li>
                            </li>
                            <style>
                                li .it {
                                    width: 100px;
                                    border: 2px solid red;
                                    background-color: red;
                                    color: #fff;
                                    text-align: center;
                                    position: absolute;
                                    /* visibility: hidden; */
                                    /* opacity: 0; */
                                    position: absolute;
                                    margin-left: -30px;
                                }

                                li .user a:hover .it {
                                    visibility: visible;
                                    opacity: 1;
                                }
                            </style>
                        </ul>
                        <a href="" class="theme"><i class="fa fa-sun-o"></i></a>
                        <style>
                            .theme{
                                z-index: 999999;
                                color: #808080;
                                position: absolute;
                                margin-left: 48%;
                                margin-top: -3.4%;
                                font-size: 20px;
                            }
                            @media screen and (max-width:992px) {
                                .theme{
                                    margin-left: 16%;
                                    margin-top: 2%;
                                    font-size: 22px;
                                }
                            }
                        </style>

                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="big-container">
            <div class="marque">
                <!-- <marquee behavior="lhs" direction="lhs">This is Influence calculating Device and Exam software. When registered, you will be emailed your registration number  and note that password is a very important criterion in registration.</marquee> -->
            </div>
            <div class="previews">
                <div class="first-row shadow">

                </div>
                <div class="second-row">
                    <div class="topics shadow">
                        <div class="first-topic">
                            <a href="pages/density/density.php" class="density">
                                <!-- <div class="density"> -->
                                    Density
                                <!-- </div> -->
                            </a>
                            <!-- <div class="quadratic"> -->
                                <a href="pages/quadratic/quadratic.php" class="quadratic">Quadratic Equation</a>
                            <!-- </div> -->
                        </div>
                        <div class="first-topic">
                            <!-- <div class="scientific"> -->
                                <a href="" class="scientific">Scientific Calculator<i class="fa fa-calculator" aria-hidden="true"></i></a>
                            <!-- </div> -->
                            <!-- <div class="standard"> -->
                                <a href="pages/statistics/index.php" class="standard">Statistics <i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                            <!-- </div> -->
                        </div>
                        <div class="first-topic">
                            <!-- <div class="pythagoras"> -->
                                <a href="" class="pythagoras">Pythagoras Theorem</a>
                            <!-- </div> -->
                            <!-- <div class="exam"> -->
                                <a href="pages/exam/examlogin.php" class="exam">Exam quiz</a>
                            <!-- </div> -->
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>

</body>

</html>
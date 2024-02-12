<?php
require_once __DIR__ . "/../../src/header.php";
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../../config/dbh.php";

// require_once __DIR__ . "/../admin/admin.classes.php";
// require_once __DIR__ . "/../admin/adminContr.php";

// $is_admin = 0;

// $admin = new AdminContr($is_admin);
// $rows = $admin->display();





// $is_product = 0;
// $data = new ProductView($is_product);
// $details = $data->displayProducts2();

?>
<style>
    .container-fluid{
        background-image: linear-gradient(white, white, white);
    }
    .card {
        border: 1px solid grey;

        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
        background-image: linear-gradient(white, white, white);
    }

    .card:before {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        /* width: 4px; */
        height: 100%;
        background-color: #E1BEE7;
        transform: scaleY(1);
        transition: all 0.5s;
        transform-origin: bottom;
    }

    .card:after {

        content: "";
        position: absolute;
        left: 0;
        top: 0;
        /* width: 4px; */
        height: 100%;
        /* background-color:#8E24AA; */
        background-color: #FE48AA;

        transform: scaleY(0);
        transition: all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after {
        transform: scaleY(1);
    }


    .fonts {
        font-size: 11px;
    }

    .social-list {
        display: flex;
        list-style: none;
        justify-content: center;
        padding: 0;
    }

    .social-list li {
        padding: 10px;
        /* color:#8E24AA; */
        font-size: 15px;
        /* font-weight: bold; */
    }

    .buttons {
        display: flex;
        justify-content: center;
    }

    .buttons button:nth-child(1) {
        /* border:1px solid #8E24AA !important;
       color:#8E24AA; */
        border: 1px solid blue !important;
        color: blue;
        height: 40px;
    }

    .buttons button:nth-child(1):hover {
        border: 1px solid blue !important;
        /* border:1px solid #8E24AA !important; */
        color: #fff;
        height: 40px;
        /* background-color:#8E24AA; */
        background-color: blue;
    }

    .buttons button:nth-child(2) {
        /* border:1px solid #8E24AA !important;
       background-color:#8E24AA; */
        border: 1px solid blue !important;
        background-color: blue;
        color: #fff;
        height: 40px;
    }
</style>
<section>
    <div class="container-fluid mt-5">
        <div class="row d-flex justify-content-start">
            <?php
            require_once __DIR__ . "/../../public/profile.classes.php";
            require_once __DIR__. "/../../public/profile.contr.php";
            $administration = new ProfileContr($_SESSION['id']);
            $administry = $administration->displayProfile($_SESSION['id']);
            ?>
            <?php
            foreach ($administry as $ministry) :
            ?>
                <div class="col-sm-12 col-md-9 col-lg-9 bg-light">
                    <div class="card p-3 py-4">
                        <div class="d-flex justify-content-center w-100">
                            <div class="d-flex border w-100" style="height: 25rem; width:100%;">
                                <img src="../../inc/profileUploads/<?= $ministry['profileImage'] ?>" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="text-start">
                            <div class="border position-relative" style="width: 10rem; margin-top: -60px; height: 10rem; border-radius: 100%; overflow: hidden">
                                <img src="../../inc/profileUploads/<?= $ministry['profileImage'] ?>" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <label for="phpto" class="fs-3 fw-bold">Change photo<i class="fa fa-camera fa-1x"></i></label>
                            <input type="file" id="phpto" class="form-control d-none">

                            <h5 class="mt-2 mb-0 fw-bold d-flex justify-content-center align-item-center">
                                <?php echo strtoupper($ministry['fullName']); ?> <div class="verified-badge"></div>
                            </h5>
                           
                            <style>
                                .verified-badge {
                                    width: 20px;
                                    height: 20px;
                                    background-color: #1da1f2;
                                    border-radius: 50%;
                                    border: 2px solid #fff;
                                    position: relative;
                                    margin-bottom: -1rem;
                                }

                                .verified-badge::before {
                                    content: "\2713";
                                    color: #fff;
                                    font-size: 12px;
                                    font-weight: bold;
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                }
                            </style>
                            <span>Registered User</span>

                            <div class="px-4 mt-1">
                                <p class="fonts fs-4"><?= ucfirst($ministry['username']) ?> </p>
                                <p class="fonts fs-4"><?= ucfirst($ministry['regNo']) ?> </p>

                            </div>
                            <ul class="social-list">
                                <li><i class="fa fa-facebook text-primary"></i></li>
                                <li><i class="fa fa-dribbble"></i></li>
                                <li><i class="fa fa-instagram"></i></li>
                                <li><i class="fa fa-linkedin"></i></li>
                                <li><i class="fa fa-google text-warning"></i></li>
                            </ul>
                            <div class="buttons">

                                <a href="create_story.html" type="button" class="button-cart px-4"> Add
                                </a>
                                <a href="ad_bio.html" type="button" class="button-cart px-4 ms-3">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="col-md-3">
                <div class="fashion">
                    <h2 class="text-light fw-bold fs-5">Photo Gallery</h2>
                </div>
                <div class="row " style="height: 8rem;">
                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <div class="row" style="height: 8rem;">
                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>

                    <div class="col-4 g-0 h-100 border ">
                        <img src="../img/8a792f1973e2b85be4d123cb50503890.jpg" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>


            <!-- for the other -->
            <div class="col-md-3">
                <div class="fashion">
                    <!-- <h2 class="text-primary fw-bold fs-5">Photos</h2> -->
                </div>

            </div>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </div> -->

        <!-- for the media querry -->


        <!-- <div class="container-fluid"> -->
        <div class="row rowed">
            <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
                <!-- <div class="col-12"> -->
                <h4 class="fw-bold text-dark text-center">Exam results</h4>
                <div class="card table-responsive">

                    <div class="card-body">
                        <style>
                            .btn-default-alt {
                                background-color: #7E7E7E;
                            }

                            .btn-default-alt:hover {
                                background-color: #FE48AA;
                                color: #fff;
                                transition: 0.5s ease-out;
                            }

                            @media screen and (max-width:992px) {
                                table {
                                    font-size: 12px;

                                }
                            }

                            @media screen and (max-width:700px) {
                                table {
                                    font-size: 7px;
                                }

                                .family-moment {
                                    font-size: 7px;
                                }
                            }

                            @media screen and (min-width:820px) and (max-width:1200px) {

                                .family-moment {
                                    font-size: 12px;
                                }
                            }
                        </style>
                        <div class="row">
                            <div class="col-12">
                                <a href="" class="btn btn-primary btn-lg">Start Exam Quiz</a>
                                <table class="table table-bordered mt-3">
                                    <tr>
                                        <th>
                                            Course
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            Html
                                        </td>
                                        <td>Not taken</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Css
                                        </td>
                                        <td>Not taken</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Javascript
                                        </td>
                                        <td>Not taken</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                    <div class="card-footer">
                        <!-- <label for="happy">
                                <ul class="social-list">
                                    <li><i class="fas fa-video text-danger"></i> Live video</li>
                                    <li><i class="fas fa-image text-success"></i> Photo/Video</li>
                                    <li><i class="fas fa-flag text-primary"></i> Live Events</li>
                                </ul>
                                <input type="file" id="happy" class="d-none">
                            </label> -->

                    </div>
                    <!-- </div> -->
                </div>

            </div>


        </div>
        <style>
            .rowed {
                width: 86%;
                margin-left: 7%;
            }

            @media screen and (max-width:992px) {
                .rowed {
                    width: 100%;
                    margin-left: 0%;
                }
            }
        </style>
        <div class="row rowed text-center d-flex mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <p>
                <h4 class="text-light fw-bold text-start">Find Friends</h4>
                </p>
                <style>
                    .friends-container {
                        /* background-color: #fff; */
                        background-image: linear-gradient(grey, pink);
                        border-radius: 15px;
                        width: 25rem;
                        height: 33rem;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }



                    @media screen and (max-width:992px) {
                        .friends-container {
                            background-color: #fff;
                            border-radius: 15px;
                            width: 20rem;
                            height: 30rem;
                            display: flex;
                            justify-content: center;
                            align-items: center;

                        }


                    }
                </style>

                <div class="friends-container">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="col-md-3 carousel-item active">
                                <div class="card" style="width: 100%;">
                                    <div class="w-100" style="height: 19rem;">
                                        <img src="../../image/download (1).jpeg" style="width:16rem; height:19rem; object-fit:cover">
                                    </div>
                                    <!-- <img src="../image/hack.jpg" class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                        <p class="card-title text-center fw-bold fs-4">Divine Esijolomi</p>
                                        <h5 class="fs-5">User</h5>

                                        <div class="buttons">
                                            <a href="my_stupid_friends.html" class="button-cart"> <i class="fa fa-eye-slash"></i><a>
                                                    <a href="#" class="button-cart ms-3"></i> <i class="fa fa-paper-plane"></i><a></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            require_once __DIR__. "/../../public/adminviewusers.classes.php";
                            require_once __DIR__. "/../../public/adminviewusers.contr.php";
                            $is_admin = 0;
                            $friends = new AdminViewUsersContr($is_admin);
                            $friends = $friends->userView();
                            foreach ($friends as $friend) :
                            ?>


                                <div class="col-md-3 carousel-item">
                                    <div class="card" style="width: 100%;">
                                        <div class="w-100" style="height: 19rem;">
                                            <img src="../../inc/profileUploads/<?= $friend['profileImage'] ?>" style="width:16rem; height:19rem; object-fit:cover">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-title text-center fw-bold fs-4"><?= strtoupper($friend['fullName']) ?></p>
                                            <h5 class="fs-5"><?= ucfirst($friend['username']) ?></h5>

                                            <div class="buttons">
                                                <a href="my_stupid_friends.html" class="button-cart"> <i class="fa fa-eye-slash"></i><a>
                                                        <a href="#" class="button-cart ms-3"><i class="fa fa-paper-plane"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>


                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
                <div class="card">
                    <h5 class="card-header"></h5>
                    <div class="card-body d-flex">
                        <div class="col-4 card" style="width: 10rem; border-radius: 17px; ">
                            <div class="pics">
                                <img src="../../inc/profileUploads/<?= $ministry['profileImage'] ?>" style="width: 100%; height:10rem;" class="card-img-top" alt="...">
                            </div>
                            <div class="font position-relative text-primary" style="margin-top: -20px;">
                                <a href="create_story.html"><i class="fa fa-plus-circle fa-3x bg-light rounded-circle"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="fs-6 fw-bold">Add Story</h5>
                            </div>
                        </div>
                        <div class="col-md-8 mt-5 family-moment">
                            <p>
                                <i class="fa fa-image "></i> Share every moment with your friends and family
                            </p>
                            <p>
                                <i class="fa fa-clock"></i> Story disappears every 24hours
                            </p>
                            <p>
                                <i class="fa fa-comments"></i> Replies and reactions are private
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <label for="happy">
                            <ul class="social-list">
                                <li><i class="fas fa-video text-danger"></i> Live video</li>
                                <li><i class="fas fa-image text-success"></i> Photo/Video</li>
                                <li><i class="fas fa-flag text-primary"></i> Live Events</li>
                            </ul>
                            <input type="file" id="happy" class="d-none">
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../../assets/bootstrap/bootstrap.js"></script>


</section>

</body>

</html>
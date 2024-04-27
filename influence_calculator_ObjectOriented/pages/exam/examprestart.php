<?php
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../../public/profile.classes.php";
require_once __DIR__ . "/../../public/profile.contr.php";
$userid = $_SESSION['id'];
$rows = new ProfileContr($userid);
$rows = $rows->displayProfile();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                <div class="card border shadow">
                    <div class="card-header fw-bold">
                        <i class="fa fa-user"></i> EXAM
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($rows as $row) :
                        ?>
                            <div class="row d-flex">
                                
                                <p class="text-center text-success fs-4 fw-lighter">The exam is scheduled for 30minutes and you are excepted to submit before the exam time ellapse</p>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <img src="../../inc/profileUploads/<?= $row['profileImage'] ?>" class="img-fluid" style="width:400px" alt="">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center fs-5">
                                    <table>
                                       <tr>
                                        <td>
                                        <p class="text-start fw-bold">Kindly check the details below to confirm if it is truely you. Good luck🥂</p>
                                        </td>
                                       </tr>
                                        <tr>
                                            <td>Name: <?= ucfirst($row['fullName']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>RegNo: <?= $row['regNo'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email: <?= ucfirst($row['email']) ?></td>
                                        </tr>
                                        
                                        <tr class="mt-3">
                                            <td><a href="examhome.php?id=2" class="btn btn-success btn-lg mt-4">Start Now</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
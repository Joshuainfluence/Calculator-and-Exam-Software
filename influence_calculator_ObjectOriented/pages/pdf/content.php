<?php
// require_once(__DIR__. "/../profile/result.php");
require_once(__DIR__ . "/../../config/session.php");
require_once(__DIR__ . "/../../config/dbh.php");
require_once(__DIR__ . "/../../public/profile.classes.php");
require_once(__DIR__ . "/../../public/profile.contr.php");

$d = $_GET['id'];
$rows = new ProfileContr($d);
$rows = $rows->displayProfile();

$c = "<h1>Influence Techie Exam Certificate</h1>";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css"> -->
</head>

<body>
    <div class="container-fluid">


        <?php
        foreach ($rows as $row) :
        ?>
            <!-- <div style='text-align:center;'> -->

            <?= $c ?>
            <div class="certificate">Exam Certificate </div>
            <style>
                .certificate {
                    width: 130px;
                    height: 30px;
                    background-color: blue;
                    text-align: center;
                    color: #fff;
                    font-size: 1.0rem;
                    font-weight: bold;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            </style>
            <?= $d ?>

            <br>
            <style>
                .container-fluid {
                    width: 100%;
                }

                .row {
                    display: flex;
                    width: 100%;
                    /* border: 1px solid red; */
                }

                .col {
                    width: 100%;
                    /* border: 1px solid blue; */
                }

               .text {
                
                    line-height: 1;
                    font-size: 2rem;
                    font-weight: lighter;
                    font-family:Georgia, 'Times New Roman', Times, serif;
                }

                table {
                    width: 100%;
                }

                tr {
                    width: 100%;
                }

                td {
                    width: 50%;
                   
                }
            </style>
            <div class="row">
                
                <div class="col">


                    <table>
                        <tr>
                            <td>
                                <img src="../../inc/profileUploads/<?= $row['profileImage'] ?>" alt="" style="width:300px; height:300px;">
                            </td>
                            <td>
                                <h4 class="text">Name: <?= ucfirst($row['fullName']) ?></h4>
                                <h4 class="text">Registration Number: <?= ucfirst($row['regNo']) ?></h4>
                                <h4 class="text">Username: <?= ucfirst($row['username']) ?></h4>
                                <h4 class="text">Course: <?= ucfirst($row['fullName']) ?></h4>
                            </td>

                        </tr>

                    </table>

                </div>
            </div>


            <!-- </div> -->
        <?php endforeach ?>

    </div>
</body>

</html>
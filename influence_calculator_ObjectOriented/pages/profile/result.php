<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../config/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">
    <script src="../../assets/nav.js" defer></script>
    <link rel="stylesheet" href="../../assets/nav.css">
    <link rel="stylesheet" href="result.css">
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
                                <a href="../exam/exam_login.php">Exam <i class="fa fa-sign-in"></i></a>
                            </li>
                            <li>
                                <a href="../exam/exam_login.php">Logout <i class="fa fa-sign-out"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-fluid p-absolute mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-6">
                            <h3><?= $_SESSION['regNo'] ?></h3>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="profile.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <h4 class="text-muted">Dear <?= ucfirst($_SESSION['username']) ?> your result for your last exam is below</h4>
                    <div class="card table-responsive">
                        <div class="card-body">
                            <table class="table table-responsive table-bordered border--secondary">
                                <thead>
                                    <tr>
                                        <th scope="row">S/N</th>
                                        <th scope="row">Question</th>
                                        <th scope="row">Options</th>
                                        <th scope="row">Correct Answer</th>
                                        <th scope="row">Your Answer</th>
                                        <th scope="row">Remark</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $regNo = $_SESSION['regNo'];
                                    $stmt = "SELECT * FROM mark WHERE user_id = '$regNo'";
                                    $result = mysqli_query(connection(), $stmt);
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id = $row['question_id'];
                                    ?>

                                        <tr class="fs-6">
                                            <td>
                                                <?= $id ?>
                                            </td>
                                            <td>
                                                <?= $row['exam_question'] ?>
                                            </td>
                                            <td class="d-flex flex-direction-column">
                                                A. <?= $row['optionA'] ?><br>
                                                B. <?= $row['optionB'] ?></br>
                                                C. <?= $row['optionC'] ?><br>
                                                D. <?= $row['optionD'] ?><br>
                                            </td>

                                            <td>
                                                <?= ucwords($row['correct_ans']) ?>
                                            </td>
                                            <td>
                                                <?= ucwords($row['user_ans']) ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['is_correct'] == "Correct") {
                                                    echo " <div class='border bg-success text-light fw-bold' style='width:75px; border-radius:5px; text-align:center'>
                                " . $row['is_correct'] . "
                                </div>";
                                                } else {
                                                    echo " <div class='border bg-danger text-light fw-bold'style='width:75px; border-radius:5px; text-align:center;'>
                                " . $row['is_correct'] . "
                                </div>";
                                                }

                                                ?>



                                            </td>
                                        </tr>
                                    <?php endwhile ?>
                                </tbody>
                            </table>
                            <div class="pdf">
                                <a href="../pdf/index.php" class="btn btn-secondary">Print Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
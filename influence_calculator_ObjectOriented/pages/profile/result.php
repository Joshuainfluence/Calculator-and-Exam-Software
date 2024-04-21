<?php
require_once __DIR__ . "/../../src/header.php";
require_once(__DIR__ . "/../../config/dbh.php");
require_once(__DIR__ . "/../../config/session.php");
require_once __DIR__ . "/../../public/userexamquestion.classes.php";
require_once __DIR__ . "/../../public/userexamquestion.contr.php";
$x = $_SESSION['id'];
$rows = new UserExamQuestionContr($x);
$rows = $rows->displayexamanswer();
?>

<section>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between mb-3">

                <h5 class="text-muted text-center p-fixed">Dear <?= ucfirst($_SESSION['username']) ?> your result for your last exam is below</h5>
                <div class="pdf">
                    <a href="../pdf/index.php?id=<?= $x ?>" class="button">Print <i class="fa fa-download"></i></a>
                    <style>
                        a {
                            text-decoration: none;
                            color: #fff;
                        }
                        a:hover{
                            color: #fff;
                        }

                        .pdf {
                            display: flex;

                            justify-content: center;
                            align-items: center;
                            width: 100px;
                            height: 50px;
                            border: 1px solid #000;
                            background-color: #000;
                            color: #fff;
                            transition: 0.3s ease-in;
                        }

                        .pdf:hover {
                            cursor: pointer;
                            color: red;
                            background-color: red;
                            border: 1px solid #ff0000;
                        }
                    </style>
                </div>
            </div>
            <div class="col-12">
                <!-- <div class="card table-responsive">
                    <div class="card-body"> -->
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
                        foreach ($rows as $row) :
                        ?>

                            <tr class="fs-6">
                                <td>
                                    <?= $row['questionId'] ?>
                                </td>
                                <td>
                                    <?= $row['question'] ?>
                                </td>
                                <td class="d-flex flex-direction-column">
                                    A. <?= $row['optionA'] ?><br>
                                    B. <?= $row['optionB'] ?></br>
                                    C. <?= $row['optionC'] ?><br>
                                    D. <?= $row['optionD'] ?><br>
                                </td>

                                <td>
                                    <?= ucwords($row['ans']) ?>
                                </td>
                                <td>
                                    <?= ucwords($row['userAns']) ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['isCorrect'] == "correct") {
                                        echo " <div class='border bg-success text-light fw-bold' style='width:75px; border-radius:5px; text-align:center'>
                                " . $row['isCorrect'] . "
                                </div>";
                                    } else {
                                        echo " <div class='border bg-danger text-light fw-bold'style='width:75px; border-radius:5px; text-align:center;'>
                                " . $row['isCorrect'] . "
                                </div>";
                                    }

                                    ?>



                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
</body>

</html>
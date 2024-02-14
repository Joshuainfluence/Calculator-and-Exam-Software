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
    <div class="container-fluid  mt-5">
        <div class="row">
            <div class="col-12">

                <h4 class="text-muted text-center">Dear <?= ucfirst($_SESSION['username']) ?> your result for your last exam is below</h4>

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
                <div class="pdf">
                    <a href="../pdf/index.php?id=<?= $x ?>" class="btn btn-secondary">Print Pdf</a>
                </div>
                <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
</body>

</html>
<?php
require_once(__DIR__ . "/../../config/dbh.php");
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../../public/profile.classes.php";
require_once __DIR__ . "/../../public/profile.contr.php";
$userid = $_SESSION['id'];
$rows = new ProfileContr($userid);
$rows = $rows->displayProfile();
$_SESSION['on'] = true;


require_once __DIR__ . "/../../public/userexamquestion.classes.php";
require_once __DIR__ . "/../../public/userexamquestion.contr.php";
// Get the current question ID from the URL parameter
$currentQuestionID = isset($_GET['id']) ? $_GET['id'] : 1;

// Fetch the question data for the current question
$question = new UserExamQuestionContr($currentQuestionID);
$questionData = $question->displayexamquestion();

// Count the total number of questions
$totalQuestions = count($questionData);

// Retrieve user's selected answer for the current question, if any
$userSelectedAnswer = isset($_SESSION['user_answers'][$currentQuestionID]) ? $_SESSION['user_answers'][$currentQuestionID] : '';

// Handle form submission when Submit button is clicked
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Handle answer submission and redirection to result page in submit.php
    header("Location: submit.php");
    exit(); // Terminate script execution after redirection
}

$totalQuestions = count($questionData, COUNT_NORMAL);
$navigationLinks = '';
for ($i = 1; $i <= 50; $i++) {
    $navigationLinks .= "<div class='col-1'><a href='examhome.php?id=$i' class='text-light text-center'><h1>$i</h1></a></div>";
}
date_default_timezone_set("Africa/Lagos");
// require_once(__DIR__ . "/previous.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        foreach ($rows as $row) :
        ?>
            <?= ucfirst($row['fullName']) ?> | Exam
        <?php endforeach ?>
    </title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">

    <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="container-fluid">

        <div class="row d-flex align-items-center mt-5">
            <div class="col-lg-10 offset-lg-1 shadow">

                <!-- setting a unique id from the start button -->

                <!-- Setting the start button to an id of one -->


                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php endif ?>

                <?php
                $questionNumbers = count($questionData, COUNT_NORMAL);
                if ($questionData != $questionNumbers && isset($_SESSION['on'])) {

                ?>
                    <?php
                    // the if condition is to display the exam question only if the start button isset
                    // if (isset($_GET['id'])) :
                    // $time = date("H:i:s");
                    // the id is set so one from the start value, which is the beginning of the counting from the database
                    foreach ($questionData as $question) :
                        // $x = $_GET['id'];
                        $questionID = $question['id'];
                        $userSelectedAnswer = isset($_SESSION['user_answers'][$questionID]) ? $_SESSION['user_answers'][$questionID] : '';

                    ?>



                        <div id="timer" class="fw-400 fs-5 text-center">30m 0s</div>
                        <h4>Question <?= $currentQuestionID ?></h4>

                        <div class="form-group  align-items-center mt-3">
                            <form action="submit.php" method="POST" id="examForm">
                                <? //= $time 
                                ?>
                                <input type="hidden" name="question[<?= $currentQuestionID ?>]" value="<?= $question['question'] ?>">
                                <input type="hidden" name="a[<?= $currentQuestionID ?>]" value="<?= $question['optionA'] ?>">
                                <input type="hidden" name="b[<?= $currentQuestionID ?>]" value="<?= $question['optionB'] ?>">
                                <input type="hidden" name="c[<?= $currentQuestionID ?>]" value="<?= $question['optionC'] ?>">
                                <input type="hidden" name="d[<?= $currentQuestionID ?>]" value="<?= $question['optionD'] ?>">

                                <div class="question fw-600 fs-5">
                                    <?= ucfirst($question['question']) ?>
                                </div>
                                <div class="question fw-400 fs-5">
                                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                </div>
                                <div class="question fw-400 fs-5">
                                    a. <input type="radio" name="ans[<?= $currentQuestionID ?>]" id="a" value="a" <?= $userSelectedAnswer === 'a' ? 'checked' : '' ?>>
                                    <label for="a"><?= ucfirst($questionData[0]['optionA']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    b. <input type="radio" name="ans[<?= $currentQuestionID ?>]" id="b" value="b" <?= $userSelectedAnswer === 'b' ? 'checked' : '' ?>>
                                    <label for="b"><?= ucfirst($questionData[0]['optionB']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    c. <input type="radio" name="ans[<?= $currentQuestionID ?>]" id="c" value="c" <?= $userSelectedAnswer === 'c' ? 'checked' : '' ?>>
                                    <label for="c"><?= ucfirst($questionData[0]['optionC']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    d. <input type="radio" name="ans[<?= $currentQuestionID ?>]" id="d" value="d" <?= $userSelectedAnswer === 'd' ? 'checked' : '' ?>>
                                    <label for="d"><?= ucfirst($questionData[0]['optionD']) ?></label>
                                </div>



                                <div class="form-group d-flex justify-content-between mt-5 mb-2">
                                    <div class="action">
                                        <?php if ($currentQuestionID > 1) : ?>
                                            <a href="examhome.php?id=<?= $currentQuestionID - 1 ?>" class="btn btn-primary btn-lg">Previous</a>
                                        <?php endif; ?>
                                        <?php if ($currentQuestionID < 19) : ?>
                                            <a href="examhome.php?id=<?= $currentQuestionID + 1 ?>" class="btn btn-success btn-lg">Next</a>
                                        <?php endif; ?>
                                    </div>
                                    <input type="submit" name="submit" class="submit btn btn-danger" value="Submit">
                                </div>
                            </form>

                        </div>

                        <div class="row">
                            <div class="col-12 na shadow d-flex text-light">
                                <style>
                                    .na {
                                        display: flex;
                                        flex-wrap: wrap;
                                    }

                                    .col-1 {
                                        border: 1px solid grey;
                                        background-color: black;
                                        transition: 0.3s ease-in;
                                    }

                                    .col-1:hover {
                                        background-color: red;
                                    }

                                    a {
                                        text-decoration: none;
                                    }
                                    @media screen and (max-width:992px) {
                                        .col-1 h1 {
                                            font-size: 17px;
                                            text-align: center;
                                        }
                                    }
                                </style>
                                <?= $navigationLinks ?>

                            </div>
                        </div>



                    <?php endforeach ?>
                <?php
                } elseif (isset($_SESSION['end'])) {
                ?>

                    <div class="alert alert-success mt-3">
                        Your exam has been submitted successfully
                    </div>

                    <script>
                        // $('.submit').on('click', function(e) {
                        //     e.preventDefault();
                        // const href = $(this).attr('href')

                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Exam will be submitted immediately',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Delete Record',
                        }).then((result) => {
                            if (result.value) {
                                document.location.href = "examhome.php?id=<?= $x ?>";
                            }

                        })
                        // })
                        const flashdata = $('.flash-data').data('flashdata')
                        if (flashdata) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Record Deleted',
                                text: 'User has been deleted successfully',



                            })
                        }
                    </script>

                    <a href="../profile/result.php" class="btn btn-outline-primary">Check Score</a>
                <?php

                } else {

                ?>
                    <style>
                        .script {
                            z-index: 9999;
                        }
                    </style>
                    <div class="script">
                        <script>
                            window.onload = function() {

                                // Swal.fire("Success", "Your exam has successfully been submitted", "success");
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Exam Submitted',
                                    text: 'Exam submitted successfully',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'View result',
                                }).then((result) => {
                                    if (result.value) {
                                        document.location.href = "afterexam.php";
                                    }



                                })


                            };
                        </script>
                    </div>
                    <a href="../profile/result.php" class="btn btn-outline-primary">Check Score</a>
                <?php

                }
                ?>


            </div>
        </div>
    </div>
    <script src="timer.js"></script>
</body>

</html>
<?php unset($_SESSION['error']) ?>
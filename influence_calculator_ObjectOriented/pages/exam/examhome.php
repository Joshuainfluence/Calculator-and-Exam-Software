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
$x = $_GET['id'];
$questions = new UserExamQuestionContr($x);
$questions = $questions->displayexamquestion();


date_default_timezone_set("Africa/Lagos");
// require_once(__DIR__ . "/previous.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/font_awesome/css/font-awesome.css">

    <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>

    <script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php
                echo $_SESSION['id'];
                ?>
                <?php if ($userid) : ?>
                    <div class="message">
                        <?= $userid ?>

                    </div>
                <?php endif ?>
            </div>
            <div class="col text-end">
                <!-- getting details from database using regnNo on session as key -->
                <?php
                foreach ($rows as $row) :
                ?>
                    <img src="../../inc/profileUploads/<?= $row['profileImage'] ?>" alt="" class="img-fluid rounded-circle" width="50px" height="50px"> <?= ucfirst($row['username']) ?>
                <?php endforeach ?>

            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- setting a unique id from the start button -->

                <!-- Setting the start button to an id of one -->


                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php endif ?>

                <?php
                if ($x != 6 && isset($_SESSION['on'])) {

                ?>
                    <?php
                    // the if condition is to display the exam question only if the start button isset
                    // if (isset($_GET['id'])) :
                    $time = date("H:i:s");
                    // the id is set so one from the start value, which is the beginning of the counting from the database
                    foreach ($questions as $question) :
                        $x = $_GET['id'];

                    ?>

                        <div class="form-control mt-3">
                            <form action="next.php" method="post">
                                <?= $time ?>
                                <input type="hidden" name="id" value="<?= $question['id'] ?>">

                                <div class="question fw-600 fs-5">
                                    <?= ucfirst($question['question']) ?>
                                </div>
                                <div class="question fw-400 fs-5">
                                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                </div>
                                <div class="question fw-400 fs-5">
                                    a. <input type="radio" name="ans" id="a" value="a">
                                    <label for="a"><?= ucfirst($question['optionA']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    b. <input type="radio" name="ans" id="b" value="b">
                                    <label for="b"><?= ucfirst($question['optionB']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    c. <input type="radio" name="ans" id="c" value="c">
                                    <label for="c"><?= ucfirst($question['optionC']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    d. <input type="radio" name="ans" id="d" value="d">
                                    <label for="d"><?= ucfirst($question['optionD']) ?></label>
                                </div>
                                <div class="form-control d-flex justify-content-between">
                                    <input type="submit" class="btn btn-success btn-lg" name="next" value="Next">
                                    <input type="submit" name="submit" class="submit btn btn-danger" value="Submit">
                                </div>


                            </form>



                            <div class="row d-flex mt-3">
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>
                                <div class="col-1 bg-primary">
                                    <h1>1</h1>
                                </div>

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
                                document.location.href = "examhome.php?id=<?= $x?>";
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
                    unset($_SESSION['end']);
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
</body>

</html>
<?php unset($_SESSION['error']) ?>
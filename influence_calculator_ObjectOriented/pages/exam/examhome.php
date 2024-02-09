<?php
require_once(__DIR__ . "/../../config/dbh.php");
require_once __DIR__ . "/../../config/session.php";
require_once __DIR__ . "/../../public/profile.classes.php";
require_once __DIR__ . "/../../public/profile.contr.php";
$userid = $_SESSION['id'];
$rows = new ProfileContr($userid);
$rows = $rows->displayProfile();


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
                <a href="examhome.php?id=2" class="btn btn-primary">start</a>
                
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php endif ?>
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
                            <input type="hidden" name="id" value="<?= $question['id']?>">

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
                            <div class="form-control">
                                <input type="submit" class="btn btn-success btn-lg" value="Next">
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
                if ($x == 10) :

                ?>
                    <div class="alert alert-success mt-3">
                        Your exam has been submitted successfully
                    </div>
                    <a href="../profile/result.php" class="btn btn-outline-primary">Check Score</a>
                <?php endif ?>









            </div>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['error']) ?>
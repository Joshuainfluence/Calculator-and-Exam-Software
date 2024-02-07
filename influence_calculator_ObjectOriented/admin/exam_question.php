<?php
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/Dbh.php");
require_once __DIR__ . "/adminheader.php";
require_once __DIR__ . "/../public/adminexamquestion.classes.php";
require_once __DIR__ . "/../public/adminexamquestion.contr.php";
$x = 0;
$rows = new AdminShowQuestionContr($x);
$rows = $rows->questionShow();

?>

<div class="col-sm-12 col-md-12 col-lg-10 ">
    <div class="col-12 mb-3 d-flex mt-3">
        <input type="search" name="" id="" class="form-control" placeholder="Search for...">
        <button class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    <div class="col-12 text-muted fw-bold mb-2">
        joshuajulius2030@gmail.com <img src="../img/IMG-20230409-WA0055.jpg" class="img-fluid rounded-circle" width="30" alt="">
    </div>
    <h6>User details</h6>
    <div class="card table-responsive">
        <!-- <div class="card-header w-100">
                        user details
                    </div> -->
        <div class="card-body">
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php endif ?>
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php endif ?>
            <div class="form-group mb-3">
                <label for="">Enter Question</label><br>
                <form action="../inc/adminexamquestion.include.php" method="POST">
                    <h4><input type="text" name="question" id="input-button"></h4>
                    a. <input type="text" name="optionA" id="input-button">
                    b. <input type="text" name="optionB" id="input-button">
                    c. <input type="text" name="optionC" id="input-button">
                    d. <input type="text" name="optionD" id="input-button"><br><br>
                    <h5>set answer</h5>
                    <div class="first">
                        a <input type="radio" name="ans" value="a" id="a">
                    </div>
                    <div class="second">
                        b <input type="radio" name="ans" value="b" id="b">
                    </div>
                    <div class="third">
                        c <input type="radio" name="ans" value="c" id="c">
                    </div>
                    <div class="forth">
                        d <input type="radio" name="ans" value="d" id="d">
                    </div>

                    <input type="submit" name="submitQuestion" class="submit-button" value="Post">
                </form>
            </div>
            <div class="row">
                <?php


                foreach ($rows as $row) :
                ?>
                    <div class="form-control">
                        <?= $row['question'] ?>
                        <div class="first">
                            a. <input type="radio" name="a" id="a1" value="a"> <label for="a1"><?= $row['optionA'] ?></label> 

                        </div>
                        <div class="second">
                            b. <input type="radio" name="b" id="b" value="b"> <?= $row['optionB'] ?>
                        </div>
                        <div class="third">
                            c. <input type="radio" name="c" id="c" value="c"> <?= $row['optionC'] ?>
                        </div>
                        <div class="forth">
                            d. <input type="radio" name="d" id="d" value="d"> <?= $row['optionD'] ?>
                        </div>
                        <div class="ans text-success fw-bold">
                            Answer is <?= $row['ans'] ?>
                        </div>
                        <div class="delete">
                            <a href="delete_question.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="edit_question.php?id=<?= $row['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        </div>
                        <div class="delete">

                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</body>

</html>
<?php unset($_SESSION['error'], $_SESSION['success']) ?>
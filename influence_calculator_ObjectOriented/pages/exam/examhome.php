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
                $questionNumbers = count($questions, COUNT_NORMAL);
                if ($x != $questionNumbers && isset($_SESSION['on'])) {

                ?>
                    <?php
                    // the if condition is to display the exam question only if the start button isset
                    // if (isset($_GET['id'])) :
                    // $time = date("H:i:s");
                    // the id is set so one from the start value, which is the beginning of the counting from the database
                    foreach ($questions as $question) :
                        // $x = $_GET['id'];
                        $questionID = $question['id'];
                        $userSelectedAnswer = isset($_SESSION['user_answers'][$questionID]) ? $_SESSION['user_answers'][$questionID] :'';

                    ?>
                    <h4>Question <?= $question['id']?></h4>

                        <div class="form-group  align-items-center mt-3">
                            <form action="submit.php" method="POST">
                                <? //= $time 
                                ?>
                                <input type="hidden" name="id" value="<?= $question['id'] ?>">

                                <div class="question fw-600 fs-5">
                                    <?= ucfirst($question['question']) ?>
                                </div>
                                <div class="question fw-400 fs-5">
                                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                </div>
                                <div class="question fw-400 fs-5">
                                    a. <input type="radio" name="ans[<?=$questionID?>]" id="a" value="a" <?= $userSelectedAnswer === 'a' ? 'checked' : ''?>>
                                    <label for="a"><?= ucfirst($question['optionA']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    b. <input type="radio" name="ans[<?= $questionID?>]" id="b" value="b" <?= $userSelectedAnswer === 'b' ? 'checked' : ''?>>
                                    <label for="b"><?= ucfirst($question['optionB']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    c. <input type="radio" name="ans[<?= $questionID?>]" id="c" value="c" <?= $userSelectedAnswer === 'c' ? 'checked' : ''?>>
                                    <label for="c"><?= ucfirst($question['optionC']) ?></label>
                                </div>
                                <div class="question fw-400 fs-5">
                                    d. <input type="radio" name="ans[<?= $questionID?>]" id="d" value="d" <?= $userSelectedAnswer === 'd' ? 'checked' : ''?>>
                                    <label for="d"><?= ucfirst($question['optionD']) ?></label>
                                </div>
                                <!-- <div class="form-group d-flex justify-content-between mt-5 mb-2">
                                    <div class="action">
                                        <input type="submit" class="btn btn-primary btn-lg" name="previous" value="Previous">
                                        <input type="submit" class="btn btn-success btn-lg" name="next" value="Next">
                                    </div>
                                    <input type="submit" name="submit" class="submit btn btn-danger" value="Submit">
                                </div> -->


                                <div class="form-group d-flex justify-content-between mt-5 mb-2">
                                    <div class="action">
                                        <a href="examhome.php?id=<?= $x - 1 ?>" class="btn btn-primary btn-lg" name="previous">Previous</a>
                                        <a href="examhome.php?id=<?= $x + 1 ?>" class="btn btn-success btn-lg" name="next">Next</a>
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

                                    .col-1:hover{
                                        background-color: red;
                                    }

                                    a {
                                        text-decoration: none;
                                    }
                                </style>
                                <div class="col-1">
                                    <a href="examhome.php?id=1" class="text-light text-center">
                                        <h1>1</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=2" class="text-light text-center">
                                        <h1>2</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=3" class="text-light text-center">
                                        <h1>3</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=4" class="text-light text-center">
                                        <h1>4</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=5" class="text-light text-center">
                                        <h1>5</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=6" class="text-light text-center">
                                        <h1>6</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=7" class="text-light text-center">
                                        <h1>7</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>8</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>9</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>10</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>11</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>12</h1>
                                    </a>
                                </div>


                            </div>
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
                                    }
                                </style>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>13</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>14</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>15</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>16</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>17</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>18</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>19</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>20</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>21</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>22</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>23</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>24</h1>
                                    </a>
                                </div>


                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12 na shadow d-flex text-light">
                                <style>
                                    .na {
                                        display: flex;
                                        flex-wrap: wrap;
                                    }

                                    .col-1 {
                                        border: 1px solid grey;
                                    }

                                    @media screen and (max-width:992px) {
                                        .col-1 h1 {
                                            font-size: 17px;
                                            text-align: center;
                                        }
                                    }
                                </style>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>25</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>26</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>27</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>28</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>29</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>30</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>31</h1>
                                    </a>

                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>32</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>33</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>34</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>35</h1>
                                    </a>
                                </div>
                                <div class="col-1">
                                    <a href="examhome.php?id=8" class="text-light text-center">
                                        <h1>36</h1>
                                    </a>
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
</body>

</html>
<?php unset($_SESSION['error']) ?>
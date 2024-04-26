<?php

require_once __DIR__ . "/../../public/userexamquestion.classes.php";
require_once __DIR__ . "/../../public/userexamquestion.contr.php";
require_once __DIR__ . "/../../config/dbh.php";
require_once __DIR__ . "/../../config/session.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // 
    $questionid = $_POST['id'];
    $user_ans = isset($_POST['ans[]']);
    $rows = new UserExamQuestionContr($questionid);
    $rows = $rows->displayexamquestion();
    $userid = $_SESSION['id'];
    foreach ($rows as $row) {
        $question = $row['question'];
        $correct_ans = $row['ans'];
        $optionA = $row['optionA'];
        $optionB = $row['optionB'];
        $optionC = $row['optionC'];
        $optionD = $row['optionD'];
        $isCorrect = ($user_ans === $correct_ans) ? "correct" : "wrong";
    }

    $insert = new UserAddExamAnswerContr($questionid, $question, $optionA, $optionB, $optionC, $optionD, $correct_ans, $userid, $user_ans, $isCorrect);
    $insert = $insert->useranswerAdd();
    header("Location: ../profile/result.php");
}

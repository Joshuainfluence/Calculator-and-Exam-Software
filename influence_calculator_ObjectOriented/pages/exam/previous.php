<?php
require_once __DIR__ . "/../../public/userexamquestion.classes.php";
require_once __DIR__ . "/../../public/userexamquestion.contr.php";
require_once __DIR__ . "/../../config/dbh.php";
require_once __DIR__ . "/../../config/session.php";

$questionid = $_POST['id'];
$user_ans = isset( $_POST['ans']);
$rows = new UserExamQuestionContr($questionid);
$rows = $rows->displayexamquestion();
$submit = isset($_POST['submit']);
$userid = $_SESSION['id'];


if (isset($submit)) {
    $_SESSION['end'] = true;
    header("location: examhome.php?id=false");
}

if (!empty($user_ans)) {
    foreach ($rows as $row) {
        $question = $row['question'];
        $correct_ans = $row['ans'];
        $optionA = $row['optionA'];
        $optionB = $row['optionB'];
        $optionC = $row['optionC'];
        $optionD = $row['optionD'];
        $isCorrect = ($user_ans === $correct_ans) ? "correct" : "wrong";


        $insert = new UserAddExamAnswerContr($questionid, $question, $optionA, $optionB, $optionC, $optionD, $correct_ans, $userid, $user_ans, $isCorrect);
        $insert = $insert->useranswerAdd();

        header("Location: examhome.php?id=" . ($questionid - 1));
    }
} else {
    echo "fields cannot be empty";
}

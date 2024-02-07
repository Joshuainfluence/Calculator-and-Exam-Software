<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $question = htmlspecialchars($_POST['question'], ENT_QUOTES, 'UTF-8');
    $optionA = htmlspecialchars($_POST['optionA'], ENT_QUOTES, 'UTF-8');
    $optionB = htmlspecialchars($_POST['optionB'], ENT_QUOTES, 'UTF-8');
    $optionC = htmlspecialchars($_POST['optionC'], ENT_QUOTES, 'UTF-8');
    $optionD = htmlspecialchars($_POST['optionD'], ENT_QUOTES, 'UTF-8');
    $ans = $_POST['ans'];
    
    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__. "/../config/session.php";
    require_once __DIR__. "/../public/adminexamquestion.classes.php";
    require_once __DIR__. "/../public/adminexamquestion.contr.php";
    // $id = $_SESSION['id'];
    $set = new AdminExamQuestionContr($question, $optionA, $optionB, $optionC, $optionD, $ans);
    
    $set->questionAdd();

    header("Location: ../admin/exam_question.php");

    

}
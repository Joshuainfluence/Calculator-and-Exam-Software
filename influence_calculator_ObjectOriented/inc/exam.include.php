<?php 


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $regNo = htmlspecialchars($_POST['regNo'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    
    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__ . "/../config/session.php";
    require_once __DIR__. "/../public/exam.classes.php";
    require_once __DIR__. "/../public/exam.contr.php";
    // $id = $_SESSION['id'];
    $login = new ExamContr($regNo, $password);
    
    $login->loginExam();

    header("Location: ../pages/exam/examprestart.php");

    

}
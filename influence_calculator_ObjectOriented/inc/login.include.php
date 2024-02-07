<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    require_once __DIR__. "/../config/dbh.php";
    require_once __DIR__ . "/../config/session.php";
    require_once __DIR__. "/../public/login.classes.php";
    require_once __DIR__. "/../public/login.contr.php";

    $login = new LoginContr($username, $password);
    
    $login->LogUser();

    header("Location: ../pages/profile/profile.php");

    

}
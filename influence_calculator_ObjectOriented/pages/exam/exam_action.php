<?php 
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../library/functions.php");
require_once(__DIR__. "/../../config/session.php");

$regNo = $_POST['regNo'];
$password = $_POST['password'];

try {
    required($regNo, "Registration Number");
    required($password, "Password");
    exam_login($regNo, $password);
    $_SESSION['regNo'] = $regNo;
    redirect("exam_home");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("exam_login");
}
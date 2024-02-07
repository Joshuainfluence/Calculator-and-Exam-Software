<?php
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../library/functions.php");
require_once(__DIR__. "/../../config/session.php");
$username = $_POST['username'];
$password = $_POST['password'];

try {
    required($username, "Username");
    required($password, "Password");
    admin_log($username, $password);
    user_login($username, $password);
    $_SESSION['username'] = $username;
    redirect("../profile/profile");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("login");
}
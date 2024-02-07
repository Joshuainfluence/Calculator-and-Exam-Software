<?php
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../library/functions.php");
require_once(__DIR__. "/../../config/session.php");


$userCode = $_POST['code'];
$code = confirmation_code();

try {
    required($userCode, "Confirmation code");
    save_con_code($code);
    code_loop(read_file(), $userCode);
    // code_validator($userCode, $code);
    redirect("../profile/profile");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("code");
}
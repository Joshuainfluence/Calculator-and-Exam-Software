<?php 
require_once(__DIR__. "/../config/session.php");
require_once(__DIR__. "/../config/connection.php");
require_once(__DIR__. "/functions.php");
 
try {
    $file = file_upload($_FILES['file_upload']);
    if($file){
        insert_profile($file['new_name']);
        $_SESSION['success'] = "File Uploaded";
        header('location:view.php');
    }
} catch (\Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('location:view.php');
}

<?php 
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../library/functions.php");
$id = $_GET['id'] + 1;
$stmt = "SELECT * FROM exam WHERE id='$id'";
$result = mysqli_query(connection(), $stmt);
// return $result;
header("Location:exam_home.php?id=$id");
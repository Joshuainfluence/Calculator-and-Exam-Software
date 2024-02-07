<?php 
require_once(__DIR__. "/../config/connection.php");
require_once(__DIR__. "/../library/functions.php");
$id = $_GET['id'];
$stmt = "DELETE FROM exam WHERE id='$id'";
$result = mysqli_query(connection(), $stmt);
redirect("exam_question");

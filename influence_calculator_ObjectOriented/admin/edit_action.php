<?php 
require_once(__DIR__. "/../config/connection.php");
require_once(__DIR__. "/../config/session.php");

$id = $_POST['id'];
$question = $_POST['question'];
$optionA = $_POST['optionA'];
$optionB = $_POST['optionB'];
$optionC = $_POST['optionC'];
$optionD = $_POST['optionD'];
$que_values = $_POST['ans'];

$stmt = "UPDATE exam SET (question, optionA, optionB, optionC, optionD, ans) = ('$question', '$optionA', '$optionB', '$optionC', '$optionD', '$que_values') WHERE id='$id'";
$result = mysqli_query(connection(), $stmt);
header("Location:edit_question.php");
<?php 
require_once(__DIR__. "/../config/connection.php");
require_once(__DIR__. "/../library/functions.php");
require_once(__DIR__. "/../config/session.php");

$value_question = $_POST['question'];
$optionA = $_POST['a'];
$optionB = $_POST['b'];
$optionC = $_POST['c'];
$optionD = $_POST['d'];
$que_values = $_POST['ans'];

$data = [
    "question" => $value_question,
    "a" => $optionA, 
    "b" => $optionB,
    "c" => $optionC,
    "d" => $optionD,
    "ans" => $que_values
];

try {
    required($value_question, "Question");
    required($optionA, "A");
    required($optionB, "B");
    required($optionC, "C");
    required($optionD, "D");
    required($que_values, "Answer");
    examVal($data);
    set_message("success", "Questions successfully uploaded");
    redirect("exam_question");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("exam_question");
}
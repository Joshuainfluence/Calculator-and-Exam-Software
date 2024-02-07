<?php 
require_once(__DIR__. "/../../library/functions.php");
require_once(__DIR__. "/../../config/session.php");

$a = $_POST['a'];
$b = $_POST['b']; 
$c = $_POST['c'];
$y = $_POST['text'];

try {
    quadratic($a, $b, $c, $y);
    set_message("success", quadratic($a,$b,$c, $y));
    redirect("quadratic");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("quadratic");
}
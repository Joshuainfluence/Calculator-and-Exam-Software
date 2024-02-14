<?php  

require_once __DIR__ . '/vendor/autoload.php';
require_once(__DIR__. "/../../config/dbh.php");
$id = $_GET['id'];

$mpdf = new \Mpdf\Mpdf();
$a = file_get_contents("http://localhost/Calculator-and-Exam-Software/influence_calculator_objectoriented/pages/pdf/content.php?id=$id");
$mpdf->WriteHTML($a);
$mpdf->Output();

?>
<?php  

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$a = file_get_contents("http://localhost/influence_calculator_updated/pages/pdf/content.php");
$mpdf->WriteHTML($a);
$mpdf->Output();

?>
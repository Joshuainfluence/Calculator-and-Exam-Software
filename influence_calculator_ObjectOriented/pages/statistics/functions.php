<?php 
require_once(__DIR__. "/session.php");
function required_table($x, $y, $z, $i, $j, $k){
    if (!empty($x)&& !empty($y)&& !empty($z)&& !empty($i)&& !empty($j)&& !empty($k)) {
        return true;
    } else {
        throw new Exception("Fields cannot be empty", 1);
        
    }
    
}

// Here the $x is representing the class mark and the $y represents the frequency of the distribution
function freq_mark($x, $y){
    $ans = $x * $y;
    return $ans;
}

function summation(){
    $total =[];
    
}
$data = [
    "class_boundary" => [],
    "class_mark" => []
];

// Here the $x represents the total of the frequency and the $y represents the total of the frequency
function mean($x, $y){

}
function class_mark_values($x, $y, $z, $i, $j, $k){
    $summation = $x + $y + $z + $i +$j + $k;
    return $summation;
}
function class_boundary($mark){
    $solving = explode("-", $mark);
    $lower_class = $solving[0]-0.5;
    $upper_class = $solving[1]+0.5;
    $class_boundary = $lower_class. "-".$upper_class;
    return $class_boundary;
    
}
function mark_array($x,$y, $z, $i, $j, $k){
    $location = "file.txt";
    $file = fopen($location, 'a');
    $write = fwrite($file, $x . "\n");
    $write = fwrite($file, $y . "\n");
    $write = fwrite($file, $z . "\n");
    $write = fwrite($file, $i . "\n");
    $write = fwrite($file, $j . "\n");
    $write = fwrite($file, $k . "\n");
    fclose($file);
}
function read_file_table(){
    $location = 'file.txt';
    $file = fopen($location, 'r');
    $array = [];
    while (!feof($file)) {
        $get = fgets($file);
        array_push($array, $get);
    }
    fclose($file);
    return $array;
}
    // $data = [];
    // $extracted_data = array_push($data, $class_boundary);
    // return $extracted_data;

function class_mark($upper){
    $solving = explode("-", $upper);
    $lower_class = $solving[0] + $solving[1];
    $sol_lower = $lower_class/2;
    return $sol_lower;
}


    

function set_message($type, $message){
    $_SESSION[$type] = $message;
}
function redirect($to){
    header('Location:' .$to. ".php");
}
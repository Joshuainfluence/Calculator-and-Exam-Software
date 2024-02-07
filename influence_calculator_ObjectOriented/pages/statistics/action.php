<?php
require_once(__DIR__ . "/../../library/functions.php");
require_once(__DIR__ . "/../../config/session.php");

// class marks for the given distribution
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$x4 = $_POST['x4'];
$x5 = $_POST['x5'];
$x6 = $_POST['x6'];

$answers = [
    "x1" => $x1,
    "x2" => $x2,
    "x3" => $x3,
    "x4" => $x4,
    "x5" => $x5,
    "x6" => $x6
];

// frequency of  the distribution
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$f3 = $_POST['f3'];
$f4 = $_POST['f4'];
$f5 = $_POST['f5'];
$f6 = $_POST['f6'];

try {
    required_table($x1, $x2, $x3, $x4, $x5, $x6);
    required_table($f1, $f2, $f3, $f4, $f5, $f6);

    
    // required($x2, "x2");
    class_boundary($x1);
    set_message("success", " <div class='row'>
    <div class='col-3'>
        " . class_boundary($x1) . "
    </div>
    <div class='col-3'>
    " . class_mark($x1) . "
    </div>
    <div class='col-3'>
    " . freq_mark(class_mark($x1), $f1) . "
    </div>
    <div class='col-3'>
    " . class_mark_values($f1, $f2, $f3, $f4, $f5, $f6) . "
    </div>
</div>");

    redirect("directed");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("index");
}

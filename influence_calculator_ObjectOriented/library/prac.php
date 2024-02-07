<?php
$x = intval(readline("Enter the base number: "));
$y = intval(readline("Enter the power number: "));

function exponent($x, $y){
    for ($z=1; $z < $y; $y++) { 
        $z = $z * $x;
        
    }
    return $z;
}
echo exponent($x, $y);
exit;
for ($i=0; $i < 19; $i++) { 
    echo $i . "\n";
}
exit;
for ($i=0; $i < 10; $i++) { 
    if ($i == 2) {
        echo $i . " -This is the third number"."\n";
    } else {
        echo $i . " -Not the third my love \n";
    }
    
}
exit;
for ($i=0; $i < 10000; $i++) { 
    echo $i;
}
exit;
function percentage_score($x, $y){
    $percent = 100;
    $frac = $x/$y;
    return $frac * $percent . "%";
}
echo percentage_score(20, 50);
exit;
function code()
{
    $x = rand(555555, 999999);
    return $x;
}
echo code();
exit;
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 9, 2];
function count0($array)
{

    $count = 0;
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $count++;
        }
    } else {
        return "not an array";
    }

    echo  $count;
}
count0($array);
die;
$array = [1, 2, 3, 4, 5];
function count2($array)
{
    $count = 0;
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $count++;
        }
    } else {
        return "not an array";
    }

    echo  $count;
}
count2($array);
die;
function confirmation_code()
{
    $x = rand(0000, 9999);
    return $x;
}
echo confirmation_code();
die;
function regNo()
{
    $x = "ISC" . rand(0000, 9999);
    return $x;
}
echo regNo();




$username = $_SESSION['username'];
$stmt = "SELECT * FROM influence WHERE username ='$username'";
$result = mysqli_query(connection(), $stmt);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $stmtImg = "SELECT * FROM profileimg WHERE id='$id'";
        $resultImg = mysqli_query(connection(), $stmtImg);
        while ($rowImg = mysqli_fetch_assoc($resultImg)) {
            echo "<div>";
            if ($rowImg['status'] == 0) {
                echo "<img src='uploads/profile" . $id . ".jpeg'>";
            } else {
                echo "<img src='../../image/img_avatar.png'>";
            }
            echo $row['username'];
            echo "</div>";
        }
    }
}

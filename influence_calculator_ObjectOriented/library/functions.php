<?php
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/connection.php");
function required($input, $name)
{
    if (!empty($input)) {
        return true;
    } else {
        throw new Exception("$name field cannot be empty", 1);
    }
}

function set_message($type, $message)
{
    $_SESSION[$type] = $message;
}

function redirect($to)
{
    header("location:" . $to . ".php");
}

// function to calculate the density of a substance, needing two parameters where x is for mass and y is for the volume
function density($x, $y)
{
    if (required($x, "Mass") && required($y, "Volume")) {
        if (is_numeric($x) && is_numeric($y)) {
            $sol = $x / $y;
            $ans = "The density of the substance is " . $sol . "kg/m3";
            $_SESSION['explain'] = "<b>Explanation</b> <br> According to the formula <br> Density = Mass/Volume <br> the mass " . $x . "kg was being divided by the volume " . $y . "m3 ($x/$y) to give density which is " . $sol . "kgm/3";
            return $ans;
        } else {
            throw new Exception("Invalid input: Numbers only", 1);
        }
    }
}

// function to calculate the quadratic equation, needing three parameters, where x is the value of a, y is the value of b, respectively.
function quadratic($x, $y, $z, $text)
{
    if (required($text, "Question") && required($x, "a") && required($y, "b") && required($z, "c")) {
        if (is_numeric($x) && is_numeric($y) && is_numeric($z)) {
            $positive_quadrant = -1 * $y + sqrt(($y ** 2 - 4 * $x * $z));
            $negative_quadrant = -1 * $y - sqrt(($y ** 2 - 4 * $x * $z));
            $j = 2 * $x;
            $negative_ans = $negative_quadrant / $j;
            $positive_ans = $positive_quadrant / $j;
            // parameters i needed
            $l = -1 * $y;
            $n = $y * $y;
            $o = -4 * $x * $z;
            $p = 2 * $x;
            $q = $n + $o;
            $r = sqrt($q);
            $s = $l + $r;
            $t = $l - $r;
            $u = $s / $p;
            $v = $t / $p;
            $_SESSION['explain'] = "<b>Explanation</b><br><i>⚠Note: <code>-1 + -1 = -2, -1 x - 1 = 2, -1 + 1 = 0, 1 + 1 = 2</code>.</i> <br> x = (−𝑏 ± √(𝑏^2 − 4𝑎𝑐))/2𝑎<br> Where a = $x, b = $y, and c = $z <br> x = (− x $y ± √(($y^2) − 4 x $x x $z))/2x$x <br> (-x$y<sup>2</sup> = $y x $y = $n)<br> (-4 x $x x $z = $o)<br> x = (− x $y ± √($n $o)) / $p <br> x = ($l ± √($q)) / $p <br> so we know that the √$q = $r <br> x = ($l ± $r) / $p <br> We will now split the equation into two because of the '±' sign <br> x = ($l + $r) / $p or x = ($l - $r) /$p<br> x = $s / $p or x = $t / $p <br>  x = $u or x = $v <br> x = $u or $v ✅";
            $ans = " Root: x = $positive_ans or x = $negative_ans";
            return $ans;
        } else {
            throw new Exception("Invalid input: Numbers only", 1);
        }
    }
}
function email($input, $name)
{
    if (required($input, $name)) {
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            throw new Exception("Invalid $name", 1);
        }
    }
}

function regNo()
{
    $x = "ISC" . rand(0000, 9999);
    return $x;
}

function password_encrypt($input)
{
    $encrypted_password = password_hash($input, PASSWORD_DEFAULT);
    return $encrypted_password;
}
function val_pass($x, $y)
{
    if ($x == $y) {
        return true;
    } else {
        throw new Exception("Passwords do not match", 1);
    }
}

function pass_length($input, $name)
{
    if (strlen($input) >= 8) {
        return true;
    } else {
        throw new Exception("$name should be more than 8 characters", 1);
    }
}


function phone_val($input, $name)
{
    if (is_numeric($input)) {
        return true;
    } else {
        throw new Exception("Invalid Input: $name should be number", 1);
    }
}

function phone_length($input)
{
    if (preg_match('/^[0-9]{11}+$/', $input)) {
        return true;
    } else {
        throw new Exception("Invalid phone number", 1);
    }
}

// function to generate a confirmation code
function confirmation_code()
{
    $x = rand(555555, 999999);
    return $x;
    die($x);
}

// function to validate if confirmation code exits
function code_validator($x, $y)
{
    if (is_numeric($x) && is_numeric($y)) {
        if ($x == $y) {
            return true;
        } else {
            throw new Exception("Error: Incorrect Code", 1);
        }
    } else {
        throw new Exception("Invalid Input: Numbers only", 1);
    }
}

// function to validate username during signup
function user_val($input, $name)
{
    $stmt = "SELECT username FROM influence WHERE username='$input'";
    $result = mysqli_query(connection(), $stmt);
    $user_check = mysqli_num_rows($result);
    if ($user_check == 0) {
        return true;
    } else {
        throw new Exception("$name already exits", 1);
    }
}

function save_users($data)
{
    $firstName = $data['firstName'];
    $lastName = $data['lastName'];
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $phone = $data['phone'];
    $regNo = regNo();
    $stmt = "INSERT INTO influence (firstName, lastName, email, username, password, phone, regNo) VALUES ('$firstName', '$lastName', '$email', '$username', '$password', '$phone', '$regNo')";
    $result = mysqli_query(connection(), $stmt);
    return $result;
}
function admin_log($username, $password)
{
    if ($username == "admin" && $password == "admin") {
        header("Location:../../admin/admin.php");
        exit;
    }
}

// function to login users
function user_login($username, $password)
{
    // sql statement to check if the password for that particular username is correct
    $stmt = "SELECT password FROM influence WHERE username='$username'";
    $result = mysqli_query(connection(), $stmt);
    $user_check = mysqli_num_rows($result);
    if ($user_check > 0) {
        $row = mysqli_fetch_assoc($result);
        // get the password from the database in other to decrypt it
        $db_password = $row['password'];
        // comparing both passwords to check if they are same
        $decrypted = password_verify($password, $db_password);
        // if the passwords is more than zero it means it exists
        if ($decrypted > 0) {
            $stmt = "SELECT * FROM influence WHERE username ='$username' AND password ='$db_password'";
            $result = mysqli_query(connection(), $stmt);
            $_SESSION['username'] = $row['username'];
            return true;
        } else {
            throw new Exception("Incorrect Password", 1);
        }
    } else {
        throw new Exception("Account not found", 1);
    }
}

function exam_login($regNo, $password)
{
    $stmt = "SELECT password FROM influence WHERE regNo='$regNo'";
    $result = mysqli_query(connection(), $stmt);
    $user_check = mysqli_num_rows($result);
    if ($user_check > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];
        $decrypted = password_verify($password, $db_password);
        if ($decrypted > 0) {
            $stmt = "SELECT * FROM influence WHERE regNo ='$regNo' AND password = '$db_password'";
            $result = mysqli_query(connection(), $stmt);
            $_SESSION['regNo'] = $row['regNo'];
        } else {
            throw new Exception("Incorrect password", 1);
        }
    } else {
        throw new Exception("Account not found", 1);
    }
}


function examVal($data)
{
    $value_question = $data['question'];
    $optionA = $data['a'];
    $optionB = $data['b'];
    $optionC = $data['c'];
    $optionD = $data['d'];
    $queValues = $data['ans'];
    $stmt = "INSERT INTO exam (question, optionA, optionB, optionC, optionD, ans) VALUES('$value_question', '$optionA', '$optionB', '$optionC', '$optionD', '$queValues')";
    $result = mysqli_query(connection(), $stmt);
    return $result;
}
function save_con_code($x)
{
    $location = "code.txt";
    $file = fopen($location, 'a');
    $write = fwrite($file, $x . "\n");
    fclose($file);
}
function read_file()
{
    $location = "code.txt";
    $file = fopen($location, 'r');
    $array = [];
    while (!feof($file)) {
        $get = fgets($file);
        array_push($array, $get);
    }
    fclose($file);
    return $array;
}

function code_loop($x, $y)
{
    foreach ($x as $key => $value) {
        if ($y == $value) {
            return true;
        } else {
            throw new Exception("Wrong", 1);
        }
    }
}
// statistics function
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

function answer($answer){
    for ($i=0; $i < $answer; $i++) { 
        $total = 0;
    }
}

function file_upload($file)
{
    $tmp_name = $file['tmp_name'];
    $name = $file['name'];
    $size = $file['size'];
    $type = explode("/", $file['type']);
    $allowed_format = ['png', 'jpeg'];
    $location = "uploads/";
    $encrypted_name = md5(rand(5555, 9000) . $name) . "." . $type[1];

    $data = [
        "name" => $name,
        "tmp_name" => $tmp_name,
        "size" => $size,
        "type" => $type,
        "location" => $location,
        "new_name" => $encrypted_name
    ];

    if (!empty($name)) {
        if (getimagesize($tmp_name)) {
            if ($size <= 2000000) {
                if (in_array($type[1], $allowed_format)) {
                    if (!file_exists($location . $name)) {
                        if (move_uploaded_file($tmp_name, $location . $encrypted_name)) {
                            return $data;
                        } else {
                            throw new Exception("File was not unable to upload", 1);
                        }
                    } else {
                        throw new Exception("File already exits", 1);
                    }
                } else {
                    throw new Exception($type[1] . " " . "not allowed", 1);
                }
            } else {
                throw new Exception("File is too large", 1);
            }
        } else {
            throw new Exception("File is not an image", 1);
        }
    } else {
        throw new Exception("This field is required", 1);
    }
}

function percentage_score($x, $y){
    $percent = 100;
    $frac = $x/$y;
    return $frac * $percent;
}

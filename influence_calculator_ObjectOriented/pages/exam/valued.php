<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../config/session.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['ans'])) {
        // gets the id and the answer of the user from the submitted form
    // the id is the question id 
    $id = $_POST['id'];
    $user_ans = $_POST['ans'];
// get the answer from the database where the id is same with the sent one from the form
    $stmt = "SELECT * FROM exam WHERE id='$id'";
    $result = mysqli_query(connection(), $stmt);
// validate if the answers are correct
    if ($result && mysqli_num_rows($result) > 0) {
        // getting the elements in the database and storing them in a variable to inserted in another database
        $row = mysqli_fetch_assoc($result); 
            $exam_question = $row['question'];   
            $correct_ans = $row['ans']; 
            $optionA = $row['optionA'];
            $optionB = $row['optionB'];
            $optionC = $row['optionC'];
            $optionD = $row['optionD'];
            $isCorrect = ($user_ans === $correct_ans) ? "Correct" : "Wrong";
            $regNo = $_SESSION['regNo'];
            //  inserting the elements in another database
            $stmt = "INSERT INTO mark (user_id, question_id, exam_question, optionA, optionB, optionC, optionD, correct_ans, user_ans, is_correct) VALUES ('$regNo', '$id', '$exam_question','$optionA', '$optionB', '$optionC', '$optionD', '$correct_ans', '$user_ans', '$isCorrect')";
            $result = mysqli_query(connection(), $stmt);

            if ($result) {
                header("Location: exam_home.php?id=" . ($id + 1));
                exit;
            } else {
                echo "Error: " . mysqli_error(connection());
            }
        
    }
    } else {
        $_SESSION['error'] = "Fields cannot be empty";
        header("Location: exam_home.php?empty fields");
    }
    
}

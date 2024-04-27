<?php

// require_once __DIR__ . "/../../public/userexamquestion.classes.php";
// require_once __DIR__ . "/../../public/userexamquestion.contr.php";
// require_once __DIR__ . "/../../config/dbh.php";
// require_once __DIR__ . "/../../config/session.php";


// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     // 
//     $questionid = $_POST['id'];
//     $user_ans = isset($_POST['ans[]']);
//     $rows = new UserExamQuestionContr($questionid);
//     $rows = $rows->displayexamquestion();
//     $userid = $_SESSION['id'];
//     foreach ($rows as $row) {
//         $question = $row['question'];
//         $correct_ans = $row['ans'];
//         $optionA = $row['optionA'];
//         $optionB = $row['optionB'];
//         $optionC = $row['optionC'];
//         $optionD = $row['optionD'];
//         $isCorrect = ($user_ans === $correct_ans) ? "correct" : "wrong";
//     }

//     $insert = new UserAddExamAnswerContr($questionid, $question, $optionA, $optionB, $optionC, $optionD, $correct_ans, $userid, $user_ans, $isCorrect);
//     $insert = $insert->useranswerAdd();
//     header("Location: ../profile/result.php");
// }



require_once __DIR__ . "/../../public/userexamquestion.classes.php";
require_once __DIR__ . "/../../public/userexamquestion.contr.php";
require_once __DIR__ . "/../../config/dbh.php";
require_once __DIR__ . "/../../config/session.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userAnswers = $_POST['ans'] ?? []; // Retrieve all selected answers

    foreach ($userAnswers as $questionID => $user_ans) {
        // Fetch correct answer from the database
        $userid = $_SESSION['id'];
        $question = new UserExamQuestionContr($questionID);
        $correctAnswer = $question->getCorrectAnswer();

        // Compare user's answer with correct answer
        $isCorrect = ($user_ans === $correctAnswer) ? "correct" : "wrong";

        // Save user's answer to session for future reference
        $_SESSION['user_answers'][$questionID] = $user_ans;

        // Retrieve question and options from POST data
        $question = $_POST['question'][$questionID];
        $optionA = $_POST['a'][$questionID];
        $optionB = $_POST['b'][$questionID];
        $optionC = $_POST['c'][$questionID];
        $optionD = $_POST['d'][$questionID];

        // Now, you can insert the user's answer into the database
        $insert = new UserAddExamAnswerContr($questionID, $question, $optionA, $optionB, $optionC, $optionD, $correctAnswer, $userid, $user_ans, $isCorrect);
        $insert->useranswerAdd();
    }

    // After processing all answers, redirect to result page
    header("Location: ../profile/result.php");
    exit(); // Terminate script execution after redirection
}
?>


<?php
require_once(__DIR__ . "/../../config/connection.php");
require_once(__DIR__ . "/../../config/session.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $userAnswer = $_POST['ans'];

    // Retrieve the correct answer from the database
    $stmt = "SELECT correct_answer FROM exam WHERE id='$id'";
    $result = mysqli_query(connection(), $stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $correctAnswer = $row['correct_answer'];

        // Check if the user's answer is correct
        $isCorrect = ($userAnswer === $correctAnswer) ? 1 : 0;

        // Store the user's answer in the database
        $regNo = $_SESSION['regNo'];
        $stmt = "INSERT INTO user_answers (user_id, question_id, user_answer, is_correct) VALUES ('$regNo', '$id', '$userAnswer', '$isCorrect')";
        $result = mysqli_query(connection(), $stmt);

        if ($result) {
            // Successfully stored the answer
            // You can display a success message or redirect the user to the next question
            header("Location: exam_home.php?id=" . ($id + 1));
            exit;
        } else {
            // Handle the error if the answer couldn't be stored
            echo "Error: " . mysqli_error(connection());
        }
    }
}
?>
<!-- Rest of your HTML code -->

<!-- Inside your form, add a hidden input field for the question ID -->
<input type="hidden" name="id" value="<?= $row['id'] ?>">

<!-- Inside your form, add a hidden input field for the correct answer -->
<input type="hidden" name="correct_answer" value="<?= $row['correct_answer'] ?>">

<!-- Modify your submit button -->
<input type="submit" value="Submit Answer">







<?php
if (isset($_SESSION['regNo'])) {
    $regNo = $_SESSION['regNo'];
    $stmt = "SELECT * FROM influence WHERE regNo = '$regNo'";
    $result = mysqli_query(connection(), $stmt);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    header("Location:exam_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['ans'])) {
        $userAns = $_POST['ans'];

        $id = $_POST['id'];
        $anstmt = "SELECT ans FROM exam WHERE id = '$id'";
        $ansresult = mysqli_query(connection(), $anstmt);
        $ansrow = mysqli_fetch_assoc($ansresult);
        $correctAns = $ansrow['ans'];

        if ($userAns == $correctAns) {
            $feedback = "Correct!";
        } else {
            $feedback = "Wrong, try again";
        }
    }
}



?>

<?php if (isset($feedback)) : ?>
    <div class="alert alert-info"><?= $feedback ?></div>
    <a href="exam_home.php?id=<?php echo $row['id'] + 1 ?>" class="btn btn-success">Next</a>
<?php endif ?>
<?php
require_once(__DIR__ . "/../../config/connection.php");
// require_once(__DIR__ . "/../../library/functions.php");


// $id = $_GET['id'] - 1;
// $stmt = "SELECT * FROM exam WHERE id='$id'";
// $result = mysqli_query(connection(), $stmt);
// header("Location:exam_home.php?id=$id");


// $id = $_GET['id'] - 1;
// $stmt = "SELECT * FROM exam WHERE id='$id'";
// $result = mysqli_query(connection(), $stmt);

// header("Location:exam_home.php?id=$id");

function previously()
{
    if (isset($_POST['next'])) {
        $id = $_POST['id'];
        $stmt = "SELECT * FROM exam WHERE id='$id'";
        $result = mysqli_query(connection(), $stmt);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <form action='' method='post'>
                    <div class='form-control mt-2'>
                    <input type='hidden' name='question' value='" . $row['question'] . "'>
                        " . $row['question'] . "
                        <div class='question'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'> 
                        </div>
                        <div class='question'>
                            a) <input type='radio' name='name' id='a' value='a'> " . $row['valueA'] . "
                        </div>
                        <div class='question'>
                            b) <input type='radio' name='name' id='b' value='b'> " . $row['valueB'] . "
                        </div>
                        <div class='question'>
                            c) <input type='radio' name='name' id='c' value='c'> " . $row['valueC'] . "
                        </div>
                        <div class='question'>
                            d) <input type='radio' name='name' id='d' value='d'> " . $row['valueD'] . "
                        </div>
                        <div class='form-control'>
                        <form action='' method='POST'>
                        <div class='question'>
                       <input type='hidden' name='id' value='" . $row['id'] . "'> 
                        </div>
                        <input type='submit' name='previousSubmit' value='Previous' class='btn btn-outline-danger me-3'>
                       </form>

                           
                            <input type='submit' name='nextSubmit' value='Next' class='btn btn-outline-primary'>
                           
                        </div>
                    </div>
                </form>
                
                ";
        }
    }
}
?>


<div class="form-control d-flex">
<!-- when the id is reduced by one is takes you to the previous question in the database -->
<a href="exam_home.php?id=<?php echo $row['id'] - 1 ?>" class="btn btn-secondary me-3">Previous</a>
<!-- when id is increased by one it takes you to the next question in the data base -->
<a href="valued.php?id=<?php echo $row['id'] + 1 ?>" class="btn btn-success">Next</a>

</div>
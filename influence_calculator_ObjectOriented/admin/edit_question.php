<?php
require_once(__DIR__ . "/../config/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap5.min.css">
</head>

<body>
<style>
        .position {
            position: fixed;
            z-index: 9999;

        }

        a {
            color: white;
        }

        a:hover {
            color: orange;
        }

        #input-button {
            border: 0px solid white;
            border-bottom: 1px solid blue;
            outline: none;
            width: 100%;
        }

        .submit-button {
            width: 100px;
            height: 50px;
            background-color: transparent;
            color: blue;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: red;
            color: white;
            border: 1px solid red;
        }

        #input-button:focus {
            border-bottom: 4px solid red;
        }

        @media (max-width: 60rem) {
            .position {
                position: relative;
            }

            .posture {
                position: fixed;
                z-index: 9999;
            }

        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card table-responsive">
                    <!-- <div class="card-header w-100">
                        user details
                    </div> -->
                    <div class="card-body">
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                        <?php endif ?>
                        <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                        <?php endif ?>
                        <?php
                        $id = $_GET['id']; 
                        $stmt = "SELECT question FROM exam WHERE id='$id'";
                        $result = mysqli_query(connection(), $stmt);
                        if($row = mysqli_fetch_assoc($result)):

                        ?>
                        <div class="alert alert-success"><?= $row['question']?></div>
                        <?php endif?>

                        <div class="form-group mb-3">
                            <label for="">Enter Question</label><br>
                            <form action="edit_action.php" method="POST">
                                <input type="hidden" name="id" value="<?php $_GET['id']?>">
                                <h4><input type="text" name="question" id="input-button"></h4>
                                a. <input type="text" name="a" id="input-button">
                                b. <input type="text" name="b" id="input-button">
                                c. <input type="text" name="c" id="input-button">
                                d. <input type="text" name="d" id="input-button"><br><br>
                                <h5>set answer</h5>
                                <div class="first">
                                    a <input type="radio" name="ans" value="a" id="a">
                                </div>
                                <div class="second">
                                    b <input type="radio" name="ans" value="b" id="b">
                                </div>
                                <div class="third">
                                    c <input type="radio" name="ans" value="c" id="c">
                                </div>
                                <div class="forth">
                                    d <input type="radio" name="ans" value="d" id="d">
                                </div>

                                <input type="submit" name="submitQuestion" class="submit-button" value="Update">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
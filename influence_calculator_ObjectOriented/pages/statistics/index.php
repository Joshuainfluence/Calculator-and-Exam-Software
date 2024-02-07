<?php

require_once(__DIR__ . "/../../config/session.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap5.min.css">
</head>

<body>
    <div class="container">
        <form action="action.php" method="post">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Statistics</h2>
                </div>
            </div>
            <div class="row mt-3">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success mt-2"><?= $_SESSION['success'] ?></div>
                <?php endif ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger mt-2"><?= $_SESSION['error'] ?></div>
                <?php endif ?>
                <div class="col-6">
                    <div class="card">

                        <div class="card-body">
                            <h3>Class marks</h3>
                            <div class="form-group mb-2">
                                <input type="text" name="x1" id="x1" class="form-control" placeholder="Enter the value class mark">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="x2" id="x2" class="form-control" placeholder="Enter the value class mark">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="x3" id="x3" class="form-control" placeholder="Enter the value class mark">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="x4" id="x4" class="form-control" placeholder="Enter the value class mark">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="x5" id="x5" class="form-control" placeholder="Enter the value class mark">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" name="x6" id="x6" class="form-control" placeholder="Enter the value class mark">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Frequency</h3>
                            <div class="form-group mb-2">
                                <input type="number" name="f1" id="f1" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                            <div class="form-group mb-2">
                                <input type="number" name="f2" id="f2" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                            <div class="form-group mb-2">
                                <input type="number" name="f3" id="f3" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                            <div class="form-group mb-2">
                                <input type="number" name="f4" id="f4" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                            <div class="form-group mb-2">
                                <input type="number" name="f5" id="f5" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                            <div class="form-group mb-2">
                                <input type="number" name="f6" id="f6" class="form-control" placeholder="Enter the value frequency in the distribution">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input type="submit" name="submit" value="Solve" class="btn btn-outline-primary btn-lg">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php unset($_SESSION['success'], $_SESSION['error'])?>
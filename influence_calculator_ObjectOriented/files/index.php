<?php
require_once(__DIR__ . "/../config/session.php");
require_once(__DIR__ . "/../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/font_awesome/css/font-awesome.css">
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                <?php endif ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php endif ?>
                <form action="action.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            File Upload
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="file_upload">file upload</label>
                                <input type="file" name="file_upload" id="file_upload" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit"><i class="fa fa-upload" aria-hidden="true"></i></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['error'], $_SESSION['success']) ?>
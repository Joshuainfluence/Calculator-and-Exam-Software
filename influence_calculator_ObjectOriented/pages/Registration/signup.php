<?php
require_once __DIR__ . "/../../config/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../../assets/sweetalert/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../img/logo5.png" />


</head>

<body>

<style>
    .script{
        z-index: 9999;
    }
</style>
 <div class="script">
 <script>
        window.onload = function() {
            <?php if (isset($_SESSION['success'])) : ?>
                Swal.fire("Success", "<?= $_SESSION['success'] ?>", "success");
            <?php endif ?>

            <?php if (isset($_SESSION['error'])) : ?>
                Swal.fire("Error", "<?= $_SESSION['error'] ?>", "error");
            <?php endif ?>
        };
    </script>
 </div>
    <?php
    if (isset($_SESSION['success'])) :
        echo '<script>console.log("Success message: ' . $_SESSION['success'] . '");</script>';
    endif;

    if (isset($_SESSION['error'])) :
        echo '<script>console.log("Error message: ' . $_SESSION['error'] . '");</script>';
    endif;
    ?>
    <div class="container">

        <div class="row">
            <style>
                .password-container {
                    position: relative;
                }

                .toggle-password {
                    position: absolute;
                    top: 50%;
                    right: 10px;
                    transform: translateY(-50%);
                    cursor: pointer;
                }
            </style>

            <div class="content-img">

            </div>
            <div class="content">
                <div class="title">
                    Create a free Account
                </div>
                <form action="../../inc/signup.include.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="text" name="fullName" id="fullName" placeholder="Full name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" placeholder="Email address" class="form-control">
                    </div>
                    <div class="form-group password-container">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                    </div>
                    <div class="form-group password-container">
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="form-control">
                        <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
                    </div>

                    <div class="terms">
                        <input type="file" name="profileImage" id="profileImage" value="Upload">
                        <label for="file">Upload Profile Image</label>
                    </div>
                    <div class="terms">
                        <div class="check">
                            <input type="checkbox" name="check" id="check">
                            <label for="check"> I accept terms and conditions</label>
                        </div>
                        <a href="../log/terms.php">Read terms and conditions</a>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#togglePassword').click(function() {
                                togglePasswordVisibility('#password');
                            });

                            $('#toggleConfirmPassword').click(function() {
                                togglePasswordVisibility('#confirmPassword');
                            });

                            function togglePasswordVisibility(passwordFieldId) {
                                var passwordField = $(passwordFieldId);
                                var passwordFieldType = passwordField.attr('type');
                                passwordField.attr('type', passwordFieldType === 'password' ? 'text' : 'password');
                            }
                        });
                    </script>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="btn" value="Signup">
                    </div>
                    <div class="form-group">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>
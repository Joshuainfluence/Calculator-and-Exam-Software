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
    <!-- <link rel="stylesheet" href="../assets/font_awesome/css/font-awesome.css"> -->
    <link rel="icon" type="image/x-icon" href="../img/logo5.png" />

</head>

<body>
    <style>
        .script {
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
        <style>
            .form-group a {
                text-decoration: none;
                text-align: start;
                font-family: sans-serif;
                color: #FF1694;
            }

            .form-group a:hover {
                color: #FF87CE;
                /* font-weight: 600; */
            }

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

        <div class="row">

            <div class="content-img">

            </div>
            <div class="content">
                <!-- displays an alert when user signup in successfully -->
                <div class="alert"></div>
                <div class="title">
                    Login your Account to get access
                </div>
                <form action="../../inc/login.include.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group password-container">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>

                    </div>
                    <div class="form-group">
                        <a href="../sendEmail/confirmEmail.php" class="forgotten">Forgotten Password</a>
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
                        <input type="submit" name="submit" id="submit" class="btn" value="Login">
                    </div>
                    <div class="form-group">
                        <p>Don't have an account? <a href="signup.php">Signup</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php unset($_SESSION['success']);
unset($_SESSION['error']) ?>
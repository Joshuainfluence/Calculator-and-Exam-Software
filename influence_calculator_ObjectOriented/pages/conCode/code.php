<?php
require_once(__DIR__ . "/../../config/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirmation Code</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../assets//font_awesome/css/font-awesome.css">
</head>

<body>
    <div class="container">
        <div class="background-div">
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="message">
                    <h4><?= $_SESSION['error'] ?></h4>
                </div>
            <?php endif ?>
            <div class="title">
                A verification link was sent to your Email address, click to activate account.
            </div>
            <div class="form">
                <form action="https://mail.google.com/mail/u/0/#inbox/" method="POST">
                    <!-- <div class="label" for="">Enter confirmation Code</div>
                    <div class="set">
                        <input type="text" name="code" id="code" class="code">
                    </div> -->
                    <div class="verify">
                        <input type="submit" value="Check Gmail" class="btn">
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
<?php unset($_SESSION['error'])?>
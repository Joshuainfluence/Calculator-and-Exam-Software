<?php
// require_once(__DIR__. "/../profile/result.php");
require_once(__DIR__. "/../../config/session.php");
$c = " How are you doing my fellow devs?";

?>

<div style='text-align:center;'>

   <?= $c?>
   <?= $d = $_SESSION['username']?>
   <?= $regNo?>
    <br>
    <div class="woman">
        <img src="woman.jpg" alt="">
        <h1>Hello dear, How are you doing?</h1>
    </div>

</div>
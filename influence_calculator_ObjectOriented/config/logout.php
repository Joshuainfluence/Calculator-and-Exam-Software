<?php
session_start();
session_unset();
session_destroy();
header("Location:../pages/registration/login.php?You have been logged out");
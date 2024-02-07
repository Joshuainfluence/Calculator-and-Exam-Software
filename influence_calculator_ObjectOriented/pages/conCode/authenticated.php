<?php
require_once(__DIR__. "/../../config/connection.php");
require_once(__DIR__. "/../../config/session.php");
require_once(__DIR__. "/../../library/functions.php");

// if verification button is set, perform the rest task 
if (isset($_POST['auth'])) {
    // set id to the id gotten from the form
    $id = $_GET['id'];
    // performing an sql statement to get the username from the database where id is given
    $stmt = "SELECT username FROM influence WHERE id='$id'";
    $result= mysqli_query(connection(), $stmt);
    $row = mysqli_fetch_assoc($result);
    // stores the username from the database in a session where it will be returned in the profile page
    $_SESSION['username'] = $row['username'];
    // redirects the user to the profile page
    redirect("../profile/profile");
} 

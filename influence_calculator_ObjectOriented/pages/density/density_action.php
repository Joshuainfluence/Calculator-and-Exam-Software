<?php
require_once(__DIR__. "/../../config/session.php");
require_once(__DIR__. "/../../library/functions.php");
$mass = $_POST['mass'];
$volume = $_POST['volume'];

try {
    density($mass, $volume);
    set_message("success", density($mass, $volume));
    redirect("density");
} catch (\Exception $e) {
    set_message("error", $e->getMessage());
    redirect("density");
}
<?php

require '../conn.php';
// require 'clean.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $fee = $conn->real_escape_string($_POST['fees']);
    $up = $conn->query("UPDATE dpercent SET reef='$fee'");
    if($up){
        $_SESSION['msgs']="Updated successfully";
        header("Location: settings");
    }
}
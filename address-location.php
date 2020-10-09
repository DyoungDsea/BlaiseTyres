<?php
session_start();

if(isset($_POST['Address'])){
    $message = $_POST['message'];
    $_SESSION["Address"] = $message;
    // unset($_SESSION["ship_id"]);
    unset($_SESSION["ship_address"]);
}
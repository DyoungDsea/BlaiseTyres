<?php 
@session_start();
@$_SESSION['reff'] = $_GET['referral_id'];
@$_SESSION['notification_session'] = "on";
//header("location: home");
include("home.php");
?>
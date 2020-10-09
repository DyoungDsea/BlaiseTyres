<?php
session_start();
if(isset($_POST['removeSession'])){
    $_SESSION['notification_session']="off";
}

?>
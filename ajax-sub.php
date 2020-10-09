<?php
require 'conn.php';
require 'clean.php';

if(isset($_POST["subCancel"])){
    $id  = clean($_POST["id"]);
    $sql = $conn->query("UPDATE `dsub` SET dtrans_status='cancelled', pstatus='cancelled' WHERE subid='$id'");
}

if(isset($_POST['pot'])){
    $id  = clean($_POST["id"]);
    $userid  = clean($_SESSION["userid"]);
    $conn->query("DELETE FROM dwishlist WHERE userid='$userid' AND pid='$id'");
}
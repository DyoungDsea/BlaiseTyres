<?php
require 'conn.php';

$users = $conn->real_escape_string($_SESSION['userid']);

if(isset($_POST['Delete'])){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM dship_address WHERE dship_id='$id' AND userid='$users'");
}


if(isset($_POST['Default'])){
    $id = $conn->real_escape_string($_POST['id']);
    //select all user address and update to no then update default setting
    $kop = $conn->query("SELECT * FROM dship_address WHERE userid='$users'");
    if($kop->num_rows>0){
        $conn->query("UPDATE dship_address SET dstatus='no' WHERE userid='$users'");
        $conn->query("UPDATE dship_address SET dstatus='yes' WHERE dship_id='$id' AND userid='$users'");
    }
}


if(isset($_POST['Remover'])){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM `dcart_holder` WHERE orderid='$id' AND userid='$users'");
    $conn->query("DELETE FROM `dcart` WHERE orderid='$id' AND userid='$users'");
}


if(isset($_POST['Cancelr'])){
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("UPDATE dcart_holder SET payment_status='cancelled', dstatus='cancelled'  WHERE orderid='$id' AND userid='$users'");
}
<?php
require 'conn.php';
require 'clean.php';

$pid = clean($_POST['pid']);
$oid = clean($_POST['oid']);
$date = clean($_POST['date']);
$name = clean($_POST['name']);
$star = clean($_POST['star']);
$text = clean($_POST['text']);
$userid = $_SESSION['userid'];
$drate_id=date("ymdis");
$ddate=date("Y M d h:i:s");

$xop = $conn->query("INSERT INTO `drating` SET drat_id='$drate_id', duserid='$userid', dpid='$pid', dname='$name', dstar='$star', ddesc='$text', ddate='$ddate' ");

if($xop){
    $_SESSION['msgs']="Reviewed successfully";
    if(isset($_POST['sub'])){
        header("Location:subscription-payment?transaction_id=$oid");
    }else{
    header("Location:cart-payment-detail?orderid=$oid&date=$date");
    }
}else{
    $_SESSION['msg']="Oops! try again later";
    if(isset($_POST['sub'])){
        header("Location:subscription-payment?transaction_id=$oid");
    }else{
    header("Location:cart-payment-detail?orderid=$oid&date=$date");
    }
}
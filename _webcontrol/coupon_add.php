<?php
session_start();
require("../conn.php");
if(!empty($_POST['name'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id=date("ymdis");
    $name=clean_up($_POST['name']);
    $percent=clean_up($_POST['percent']);
    $start=clean_up($_POST['starts']);
    $end=clean_up($_POST['ends']);
  

    $q = $conn->query("INSERT INTO dcoupon SET dcode='$name', dpercent='$percent', dstart='$start', dend='$end', dcopid='$id'");
    if($q){
        $_SESSION['msgs']="Coupon was added"; 
    }else{
            $_SESSION['msg']="Coupon insertion failed"; 
        }    
        header("Location: coupon");
}else{
    header("Location: index");
}
?>
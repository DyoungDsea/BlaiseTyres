<?php
session_start();
require("../conn.php");
if(isset($_POST['name'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id;
    $name=clean_up($_POST['lname'],ENT_QUOTES);
    $cat=clean_up($_POST['cname'],ENT_QUOTES);
    $cate=clean_up($_POST['cate'],ENT_QUOTES);
     

    $q = $conn->query("INSERT INTO ddelivery SET dlocation='$name', dprice='$cat', dcategory='$cate'");
    if($q){
        $_SESSION['msgs']="Delivery option was added"; 
    }else{
            $_SESSION['msgs']="Delivery option insertion failed"; 
        }    
        header("Location: manage-delivery");
}else{
    header("Location: index");
}
?>
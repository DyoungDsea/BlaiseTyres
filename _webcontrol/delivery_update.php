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
    $id=clean_up($_POST['id'],ENT_QUOTES);
    $name=clean_up($_POST['lname'],ENT_QUOTES);
    $cat=clean_up($_POST['cname'],ENT_QUOTES);
    $cate=clean_up($_POST['cate'],ENT_QUOTES);

    $q = $conn->query("UPDATE ddelivery SET dlocation='$name', dprice='$cat', dcategory='$cate' WHERE id='$id' ");
    if($q){
        $_SESSION['msgs']="Delivery location Updated"; 
    }else{
            $_SESSION['msgs']="Delivery location Update failed"; 
        }    
        header("Location: manage-delivery");
}else{
    header("Location: index");
}
?>
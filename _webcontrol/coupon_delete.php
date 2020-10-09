<?php
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->query("DELETE FROM dcoupon where dcopid='$id'");
        if($query){
            $_SESSION['msgs']="Coupon was deleted";           
        }else{
            $_SESSION['msg']="Coupon deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
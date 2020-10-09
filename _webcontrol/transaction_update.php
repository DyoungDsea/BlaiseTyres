<?php
session_start();
require_once("../conn.php");
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(!empty($_POST['status'])){
    $query=$conn->prepare("update transaction set status=? where id=?");
    $query->bind_param('si',$status,$id);
    $id=clean_up($_POST['id']);
    $status=clean_up($_POST['status']);
    if($query->execute()){
        $_SESSION['msg']="Status Updated";
    }else{
        $_SESSION['msg']="Failed to update status";
    }    
    header("Location: transactions");
}else{
	header("Location: index");
}
 ?>

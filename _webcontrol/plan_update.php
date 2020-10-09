<?php
session_start();
require_once("../conn.php");
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(isset($_POST['log'])){	
    $query=$conn->prepare("update plans set plan=?,extension=? where id=?");
    $query->bind_param('sii',$plan,$extension,$id);
    $id=clean_up($_POST['id']);
    $plan=clean_up($_POST['plan']);
    $extension=clean_up($_POST['extension']);
    if($query->execute()){
        $_SESSION['msg']="Plan Updated";
    }else{
        $_SESSION['msg']="Failed to update plan";
    }    
    header("Location: plans");
}else{
	header("Location: index");
}
 ?>

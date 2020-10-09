<?php
session_start();
require("../conn.php");
$ref=$_GET['user_id'];
if(isset($_GET['s']) && isset($_GET['user_id'])){
    $stat=$_GET['s'];
    if($stat=="ban"){
        $status="ban";
    }else{
        $status="unban";
    }
    $query=$conn->prepare("update `_security` set dstatus=? where userid=?");
    $query->bind_param('ss',$status,$ref);
    $query->execute();
    $_SESSION['msgs']="User set to ".$status;
    header("Location: account-view?user_id=".$ref);
}else{
   header("Location: account-view?user_id=".$ref);
}
?>
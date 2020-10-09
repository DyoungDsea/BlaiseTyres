<?php
require("../conn.php");
$ref=$_GET['referral_id'];
if(isset($_GET['s']) && isset($_GET['referral_id'])){
    $stat=$_GET['s'];
    if($stat=="ban"){
        $status="banned";
    }else{
        $status="active";
    }
    $query=$conn->prepare("update login set dstatuss=? where userid=?");
    $query->bind_param('ss',$status,$ref);
    $query->execute();
    $_SESSION['msg']="User set to ".$status;
    header("Location: account_view?userid=".$ref);
}else{
   header("Location: account_view?userid=".$ref);
}
?>
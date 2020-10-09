<?php
require_once("../conn.php");
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(isset($_POST['log'])){
    $id=clean_up($_POST['id']);
    $name=clean_up($_POST['name']);
    $percent=clean_up($_POST['percent']);
    $start=clean_up($_POST['starts']);
    $end=clean_up($_POST['ends']);

    $query=$conn->query("update dcoupon set dcode='$name', dpercent='$percent', dstart='$start', dend='$end' where dcopid='$id'");
    
    if($query){
        $_SESSION['msgs']="Coupon Updated";
    }else{
        $_SESSION['msg']="Failed to update coupon";
    }    
    echo "<script>history.back();</script>";
}else{
	header("Location: index");
}
 ?>

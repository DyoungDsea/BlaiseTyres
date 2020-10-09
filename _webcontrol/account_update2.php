<?php
session_start();
require("../conn.php");
if(isset($_POST['log'])){
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $referral_id=$_POST['referral_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $level=$_POST['level'];
    $query=$conn->prepare("update login set name=?,email=?,phone=?,address=?,level=? where referral_id=?");
    $query->bind_param('sssssi',$name,$email,$phone,$address,$level,$referral_id);
    if($query->execute()){
        $_SESSION['msg']="Success! Account Updated";
        header("Location: account_view?referral_id=".$referral_id);
    }else{
        $_SESSION['msg']="Failed! fill all empty fields";
        header("Location: account_view?referral_id=".$referral_id);
    }
}else{
    header("Location:index");
}
?>
<?php
require("../../conn.php");
include 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['passed'])){
    $bname=clean_up(md5($_POST['old']));
    $anum=clean_up(md5($_POST['new']));
    $accname=clean_up(md5($_POST['cnew']));
    $hide=clean_up($_POST['hid']);

    if($anum == $accname){
    $check = $conn->query("SELECT userid, pword FROM `_security` WHERE pword='$bname' AND userid='$hide'");
    if($check->num_rows>0){
    $up=$conn->query("UPDATE `_security` SET pword='$anum' WHERE userid='$hide' ");
    if($up){
    $_SESSION['msgs']="Password changed successfully";
    header("location: ../index"); 
    }else{
    $_SESSION['msg']="Failed!..try again later";
    header("location: ../index");
    }
    }else{
    header("location: ../index");
    }
}else{
    $_SESSION['msg']="Password do not match!..try again later";
    header("location: ../index");
}
}


// if(isset($_POST['passed'])){
//   $bname=clean_up(md5($_POST['old']));
//   $anum=clean_up(md5($_POST['new']));
//   $accname=clean_up(md5($_POST['cnew']));
//   $hide=clean_up($_POST['hid']);

//   if($anum == $accname){
//   $check = $conn->query("SELECT user_id, password FROM `login` WHERE password='$bname' AND user_id='$hide'");
//   if($check->num_rows>0){
//   $up=$conn->query("UPDATE `scheme_users` SET password='$anum' WHERE user_id='$hide' ");
//   if($up){
//   $_SESSION['msgs']="Password changed successfully";
//   header("location: ../dashboard"); 
//   }else{
//   $_SESSION['msg']="Failed!..try again later";
//   header("location: ../dashboard");
//   }
//   }else{
//   header("location: ../login");
//   }
// }else{
//   $_SESSION['msg']="Password do not match!..try again later";
//   header("location: ../dashboard");
// }
// }

}







?>
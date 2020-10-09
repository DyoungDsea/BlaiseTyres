<?php
session_start();
require_once("../conn.php");
        
if(isset($_POST['log'])){
    
    $name=clean_up($_POST['name']);
    $phone=clean_up($_POST['phone']);
    $email=clean_up($_POST['email']);
    $address=clean_up($_POST['address']);
    $web=clean_up($_POST['web']);
    $facebook=clean_up($_POST['facebook']);
    $twitter=clean_up($_POST['twitter']);
    $instagram=clean_up($_POST['instagram']);
    $id=clean_up($_POST['id']);
    $query=$conn->query("UPDATE `_security` set dphone='$phone', dtitle='$name', demail='$email', dwebsite='$web', address='$address',social_fb='$facebook', social_tw='$twitter', social_in='$instagram' where id='$id'");    
    
    if($query){
        $_SESSION['msgs']="Site Settings Updated";
    }else{
        $_SESSION['msgs']="Failed! please fill all inputs";
    }    
    header("Location: settings");
}else{
	header("Location: index");
}


function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    return $value;
}
 ?>

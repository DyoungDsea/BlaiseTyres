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
$id;
$name=clean_up($_POST['name']);
$email=clean_up($_POST['email']);
$password1=md5(clean_up($_POST['password1']));
$password2=md5(clean_up($_POST['password2']));
$phone=clean_up($_POST['phone']);   
$address=clean_up($_POST['address']);
$status="active";
$privilege="customer";
$referrer=!empty($_POST['referrer']) ? $_POST['referrer'] : "NULL";
$branch="NULL";
$wallet=0;
$level=$_POST['level'];
$referral_id=date('dmYHis');
$supervisor_id=!empty($_POST['supervisor_id']) ? $_POST['supervisor_id'] : "NULL";
$query=$conn->prepare("insert into login values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$query->bind_param('issssssssssssss',$id,$name,$email,$password1,$phone,$address,$status,$privilege,$referrer,$branch,                      $wallet,$level,$referral_id,$supervisor_id,$created_at);
    if($query->execute()){
        $subject=$web_email." Account Signup";
        $message="Goodday ".$name.", your account signup was successful\r\n";
        $header= "From: ".$web_name." <".$web_email.">";
        mail($email,$subject,$message,$header);
        $_SESSION['msg']="Account Creation was successful";
      header("location: accounts"); 
    }else{
      $_SESSION['msg']="Signup failed!..inputs incorrectly filled";
      header("location: accounts");
    }
}else{
    header("Location:index");
}
?>
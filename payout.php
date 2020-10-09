<?php
session_start();
include 'clean.php';
require("conn.php");
$fee = $conn->query("SELECT * FROM charge ")->fetch_assoc();
$access = $fee['fees'];

if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    if(isset($_POST['requested'])){

        $name=clean($_POST['name']);
        $wallet=clean($_POST['wallet']);
        $num=clean($_POST['num']);
        $pass=clean(md5($_POST['pass']));
        $hide=clean($_POST['hid']);
        $bank=clean($_POST['bank']);
        $bank_name=clean($_POST['bank_name']);
        $bank_account=clean($_POST['bank_account']);
    
        if($wallet >= $num){
          if($num >=$access){
        $checks = $conn->query("SELECT * FROM `login` WHERE dpass='$pass' AND userid='$hide'");
        if($checks->num_rows>0){
          $r=$checks->fetch_assoc();
          $pid = date('diYis');
          $balance = ((Float)$r['dwallet']) - ((Float)$num);
          
          $pay = $conn->query("INSERT INTO payout SET userid='$hide', payment_id='$pid', name='$name', amount='$num', bank_name='$bank', account_name='$bank_name', account_number='$bank_account' ");
          if($pay){
            $up=$conn->query("UPDATE `login` SET dwallet='$balance' WHERE userid='$hide' ");
          if($up){
            // $_SESSION['stack']==true;
          $_SESSION['msgs']="Request is successfully placed";
          header("location: history"); 
          }else{
          $_SESSION['msg']="Failed!..try again later";
          header("location: history");
          }
          }
        
      }
    }else{
        $_SESSION['msg']="Your request is lower than &#8358;$access";
        header("location: dashboard");
      
    }
    }else{
      $_SESSION['msg']="Invalid request!..try again later";
      header("location: history");
    }
    }else{
      header("location: ../login");
      }
    
    
    
    
}







?>
<?php
session_start();
require("../conn.php");
if(!empty($_POST['referral_id'])){
    if(!empty($_POST['point'])){
        $point=$_POST['point'];
        $ref=$_POST['referral_id'];
        $operator=substr($point,0,1);
        $operators=['-','+','*','/'];
        if(in_array($operator,$operators)){
        $digit=substr($point,1);
        if(is_numeric($digit)){
        if($operator=="+"){
            $query=$conn->prepare("update login set wallet=wallet+?");
            $query->bind_param('s',$digit);
        }elseif($operator=="-"){
            $query=$conn->prepare("update login set wallet=wallet-?");
            $query->bind_param('s',$digit);
        }elseif($operator=="*"){
            $query=$conn->prepare("update login set wallet=wallet*?");
            $query->bind_param('s',$digit);
        }elseif($operator=="/"){
            $query=$conn->prepare("update login set wallet=wallet/?");
            $query->bind_param('s',$digit);
        }
        if($query->execute()){
            $_SESSION['msg']="Wallet was updated";
            header("Location: account_view?referral_id=".$ref);
        }else{
            $_SESSION['msg']="Invalid Operation";
            header("Location: account_view?referral_id=".$ref);
        }
        }else{
            $_SESSION['msg']="Please enter valid digits";
            header("Location: account_view?referral_id=".$ref);
        }
        }else{
            $_SESSION['msg']="Invalid Operation";
            header("Location: account_view?referral_id=".$ref);
        }
    }else{
        $_SESSION['msg']="Points cannot be left blank";
        header("Location: account_view?referral_id=".$ref);
    }

}else{
    header("Location: index");
}
?>
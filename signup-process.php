<?php
// session_start();
require("conn.php");
$wack=$conn->query("select * from `_security`");
while($row=$wack->fetch_assoc()){
    $web_name=$row['dwebsite'];
    $web_email=$row['email'];
}
if(isset($_POST['log'])){
            function clean_up($wind){
                $wind=strip_tags($wind);
                $wind=htmlspecialchars($wind);
                $wind=trim($wind);
                return $wind;
            }
    $id;
    $name=clean_up($_POST['name']);
    $email=clean_up($_POST['email']);
    $password1=md5(clean_up($_POST['pass']));
    $password2=md5(clean_up($_POST['cpass']));
    $phone=clean_up($_POST['phone']);   
    $address=clean_up($_POST['address']);
    $shipping=clean_up($_POST['shipping']);
    $hide=clean_up($_POST['hide']);
    $code=clean_up($_POST['code']);

    if(empty($_POST['referrer'])){
        $referrer="NULL";
    }else{
        $referrer=clean_up($_POST['referrer']);
    }

    $wallet=0;
    $referral_id=date('dmYHis');
    $ship_id=date('YdmHis');
    if($hide ===$code){
    if($password1===$password2){
        $conn->query("INSERT INTO `dship_address` SET userid='$referral_id', dship_id='$ship_id', daddress='$shipping', dstatus='yes' ");
                    $query=$conn->query("INSERT INTO login SET dname='$name', demail='$email', dpass='$password1', dphone='$phone', daddress='$address', referrer='$referrer', dwallet='$wallet', userid='$referral_id'");
                    if($query){
                            $subject=$web_email." Account Signup";
                            $message="Goodday ".$name.", your account signup was successful\r\n";
                            $header= "From: ".$web_name." <".$web_email.">";
                            mail($email,$subject,$message,$header);
                            $_SESSION['userid']=$referral_id;
                            $_SESSION['logged'] = true;
                            
                            $_SESSION['msgs']="Signup was successful";

                            unset($_SESSION['reff']);
                            if(isset($_SESSION['current'])){
                            header("Location: ". $_SESSION['current']);
                            }else{
                            header("Location: dashboard");    
                            }
                                
                            }else{
                            $_SESSION['msg']="Signup failed!..inputs incorrectly filled";
                            header("location: signup");
                            } 
    }else{
        $_SESSION['msg']="Passwords do not match.";
        header("location: signup");
    }
}else{
    $_SESSION['msg']="Incorrect anti-spam code.";
    header("location: signup");
}

}else{
   header("location: signup");
}
?>
<?php
// session_start();
require '../../conn.php';

$captcha_num='ABCDEFGHJKMNOPQRSTUVWXYZ234567890abcdefghjkmnopqrstuvwxyz';
$captcha_num=substr(str_shuffle($captcha_num),0,6);

$wack=$conn->query("select uname, email from `_security`");
        while($row=$wack->fetch_assoc()){
            $web_name=$row['uname'];
            $web_email=$row['email'];
        }
        

if(isset($_POST['log'])){

    $name=clean_up($_POST['name']);
    $email=clean_up($_POST['email']);
    $phone=clean_up($_POST['phone']);
//Assign privileges
    $product=!empty($_POST['product']) ? clean_up($_POST['product']).',' : "";
    $branch=!empty($_POST['branch']) ? clean_up($_POST['branch']).',' : "";
    $user=!empty($_POST['user']) ? clean_up($_POST['user']).',' : "";
    $sub=!empty($_POST['sub']) ? clean_up($_POST['sub']).',' : "";
    $franch=!empty($_POST['cat']) ? clean_up($_POST['cat']).',' : "";
    $level=!empty($_POST['subcat']) ? clean_up($_POST['subcat']).',' : "";
    $pay=!empty($_POST['product']) ? clean_up($_POST['product']).',' : "";
    $test=!empty($_POST['blog']) ? clean_up($_POST['blog']).',' : "";
    $with=!empty($_POST['with']) ? clean_up($_POST['with']).',' : "";
    $star=!empty($_POST['star']) ? clean_up($_POST['star']).',' : "";

    $slide=!empty($_POST['slide']) ? clean_up($_POST['slide']).',' : "";
    $delivery=!empty($_POST['delivery']) ? clean_up($_POST['delivery']).',' : "";
    $coupon=!empty($_POST['coupon']) ? clean_up($_POST['coupon']).',' : "";
    $site=!empty($_POST['site']) ? clean_up($_POST['site']).',' : "";
    $note=!empty($_POST['note']) ? clean_up($_POST['note']).',' : "";





    
    $password= clean_up($captcha_num);
    // $_SESSION['love']=$password;
    $pass=md5($password);

    $staff_privilege = $product.$branch.$user.$sub.$franch.$level.$pay.$test.$with.$star.$slide.$delivery.$coupon.$site.$note;

    
    $counter=0;
    $userId=date('dmYHis');
    $query=$conn->query(" INSERT INTO `_security` SET userid='$userId', uname='$name', dphone='$phone', email='$email', pword='$pass', privilege='staff', dprivilege='$staff_privilege' ");
    if($query){
        $subject=$web_email."Staff Account ";
        $message="Good day ".$name.", your staff account was successfully created\r\n";
        $message .='This is your login details: Email:'.$email.' Password: '.$password.'. Login to '.$web_name.' and change your password.';
        $header= "From: ".$web_name." <".$web_email.">";
        mail($email,$subject,$message,$header);
        $_SESSION['msgs']="Account Creation was successful";
      header("location: ../new-staff"); 
    }else{
      $_SESSION['msg']="Oops! try again later...";
      header("location: ../new-staff");
    }
}else{
    header("Location:login");
}



function clean_up($value){
    GLOBAL $conn;
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        $value = $conn->real_escape_string($value);
        return $value;                
    }
    
?>
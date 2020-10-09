<?php
require '../../conn.php';

// $captcha_num='ABCDEFGHJKMNOPQRSTUVWXYZ234567890abcdefghjkmnopqrstuvwxyz';
// $captcha_num=substr(str_shuffle($captcha_num),0,6);

// $wack=$conn->query("select uname, email from `_security`");
//         while($row=$wack->fetch_assoc()){
//             $web_name=$row['uname'];
//             $web_email=$row['email'];
//         }
             

if(isset($_POST['log'])){

    $name=clean_up($_POST['name']);
    $email=clean_up($_POST['email']);
    $phone=clean_up($_POST['phone']);
    $userId=clean_up($_POST['user_id']);
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

    $staff_privilege = $product.$branch.$user.$sub.$franch.$level.$pay.$test.$with.$star.$slide.$delivery.$coupon.$site.$note;


    $query=$conn->query("UPDATE `_security` SET  uname='$name', dphone='$phone', email='$email', dprivilege='$staff_privilege' WHERE userid='$userId'");
    if($query){
        $_SESSION['msgs']="Updated successfully";
      header("location: ../new-staff"); 
    }else{
      $_SESSION['msgs']="Oops! try again later...";
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
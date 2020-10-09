<?php
require 'conn.php';

// $result = false;
$out = '';
$cat = '';
if(isset($_POST['SumTotal'])){
    $code = $_POST['id'];

    $sql = $conn->query("SELECT * FROM dcoupon WHERE dcode='$code'");
    if($sql->num_rows>0){
        //check the percntage of the code
        $code = $sql->fetch_assoc();
        $out .= $code['dpercent'];
        if(isset($_SESSION['total'])):
            $cat = "&#8358;".number_format((Float)$code['dpercent']/100 * $_SESSION['total']);
            $_SESSION['coupons']= (Float)$code['dpercent']/100 * $_SESSION['total'];
        endif;
        if(isset($_SESSION['grand'])){
            $cat = "&#8358;".number_format((Float)$code['dpercent']/100 * $_SESSION['grand']);
            $_SESSION['coupons']= (Float)$code['dpercent']/100 * $_SESSION['grand'];
        }else{
            $cat = "&#8358;".number_format((Float)$code['dpercent']/100 * $_SESSION['total']);
            $_SESSION['coupons']= (Float)$code['dpercent']/100 * $_SESSION['total'];
        }
    }


$data = array(
    'percent'=>$out,
    'cate'=>$cat
);



    echo json_encode($data);
}
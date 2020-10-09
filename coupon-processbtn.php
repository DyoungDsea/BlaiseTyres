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
        if(isset($_SESSION['cart-total'])):
            $cat = "&#8358;".number_format((Float)$code['dpercent']/100 * $_SESSION['cart-total']);
            $_SESSION['coupon']= (Float)$code['dpercent']/100 * $_SESSION['cart-total'];
            $_SESSION['cart-total']=$_SESSION['coupon'];
        endif;
    }


$data = array(
    'percent'=>$out,
    'cate'=>$cat
);



    echo json_encode($data);
}
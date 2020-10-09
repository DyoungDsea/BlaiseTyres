<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
require("../conn.php");
include("class.upload.php");
if(!empty($_POST['pro_name']) && !empty($_POST['pro_description'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value,ENT_QUOTES);
        //$value=strip_tags($value);
        return $value;
    }

    $pro_name=clean_up($_POST['pro_name']); 
    $cat_id=clean_up($_POST['cat_id']);
    $sub=clean_up($_POST['sub']);
    $brand=clean_up($_POST['brand']);
    $display=clean_up($_POST['display']);
    $displays=clean_up($_POST['displays']);
    $discount=!empty($_POST['discount']) ? clean_up($_POST['discount']): NULL;

    $ones=!empty($_POST['ones']) ? clean_up($_POST['ones']): NULL;
    $onex=!empty($_POST['onex']) ? clean_up($_POST['onex']): NULL;
    $onez=!empty($_POST['onez']) ? clean_up($_POST['onez']): NULL;



    $width=!empty($_POST['width']) ? clean_up($_POST['width']): NULL;
    $profile=!empty($_POST['profile']) ? clean_up($_POST['profile']): NULL;
    $rim=!empty($_POST['rim']) ? clean_up($_POST['rim']): NULL;
    $bud=!empty($_POST['bud']) ? clean_up($_POST['bud']): NULL;

    $pro_desc=$_POST['pro_description']; 
    $pro_descfull=$_POST['pro_descriptionfull']; 
    $pro_descriptionsp=$_POST['pro_descriptionsp']; 
    $install_price=clean_up($_POST['reg_price']); 
    $price=clean_up($_POST['price']); 
    $avaliable=clean_up($_POST['avaliable']);   


    $proid=clean_up($_POST['id']);

    $query = $conn->query("UPDATE `products` SET  dpname='$pro_name', dcategory='$cat_id', dsub_cat='$sub', dbrand='$brand', dbudget='$bud', dwidth='$width', dprofile='$profile', drim='$rim', dpdesc='$pro_desc', dldesc='$pro_descfull', dspec='$pro_descriptionsp', davaliable='$avaliable', dinstall_price='$install_price', dplan2='$ones', dplan3='$onex', dplan4='$onez', dprice='$price', ddiscount='$discount', ddisplay_opt='$display', ddisplay_opt2='$displays' WHERE dpid='$proid'");

    if($query){
        $_SESSION['msgs']="Product was updated"; 
    }else{
            $_SESSION['msgs']="Product update failed"; 
        }    

    echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
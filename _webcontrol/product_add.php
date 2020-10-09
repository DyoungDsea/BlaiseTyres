<?php
// error_reporting(E_ERROR | E_PARSE);
// session_start();
require("../conn.php");

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

    $proid = date("msYdHm");


    $transid=date('YmHis');
    // $transid1=date('YmHd');
    // $transid2=date('YmHy');
    // $transid3=date('Ymss');
    include 'image_php/class.upload.php';
    //validate image
    if(!empty($_FILES['img']['name'])){
        $imgs = $conn->real_escape_string(clean_up($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker_product.php");
        }
        $sku = date("ymds-sh");
        $vcode = 'TOB-'.date("ysm").'U'.date("sh").'-S';
        $query = $conn->query("INSERT INTO `products` SET dpid='$proid', dvcode='$vcode', dsku='$sku', dpname='$pro_name', dcategory='$cat_id', dsub_cat='$sub', dbrand='$brand', dbudget='$bud', dwidth='$width', dprofile='$profile', drim='$rim', dpdesc='$pro_desc', dldesc='$pro_descfull', dspec='$pro_descriptionsp', davaliable='$avaliable', dinstall_price='$install_price', dplan2='$ones', dplan3='$onex', dplan4='$onez', dprice='$price', ddiscount='$discount', dimg1='$picid', ddisplay_opt='$display', ddisplay_opt2='$displays'");
        if($query){
            $_SESSION['msgs']="Product was added";        
        }else{
            $_SESSION['msgs']="Product insertion failed"; 
        } 
    }

    if(!empty($_FILES['img2']['name'])){
        $imgs = $conn->real_escape_string(clean_up($_FILES['img2']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img2']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img2']);  
        include("image_php/image_maker_product.php");          
        }
        $picids=$picid.'_1';
        $up = $conn->query("UPDATE `products` SET dimg2='$picids' WHERE dpid='$proid'" );
    }

    if(!empty($_FILES['img3']['name'])){
        $imgs = $conn->real_escape_string(clean_up($_FILES['img3']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img3']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid2=$transid.'-1';
        $foo = new Upload($_FILES['img3']); 
        include("image_php/image_maker_product.php");          
        }
        $picidx=$picid.'_2';
        $up = $conn->query("UPDATE `products` SET dimg3='$picidx' WHERE dpid='$proid'" );
    }

    if(!empty($_FILES['img4']['name'])){
        $imgs = $conn->real_escape_string(clean_up($_FILES['img4']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img4']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img4']); 
        include("image_php/image_maker_product.php");          
        }
        $picidz=$picid.'_3';
        $up = $conn->query("UPDATE `products` SET dimg4='$picidz' WHERE dpid='$proid'" );
    }
          
header("Location: products");      
}else{
    header("Location: index");
 }
?>

         

         
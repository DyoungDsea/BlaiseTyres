<?php
error_reporting(E_ERROR | E_PARSE);
// session_start();
require("../conn.php");
include("class.upload.php");
if(isset($_POST['log'])){
    
    $proid=$conn->real_escape_string($_POST['id']);
    //  die();
    $foldie=!empty($_POST['oldfirst']) ? $_POST['oldfirst'] : "";
    $soldie=!empty($_POST['oldsecond']) ? $_POST['oldsecond'] : "";
    $toldie=!empty($_POST['oldthird']) ? $_POST['oldthird'] : "";
    $loldie=!empty($_POST['oldlast']) ? $_POST['oldlast'] : "";

    $transid=date('YmHis');
    // include 'image_php/class.upload.php';
    //validate image
    
    if(!empty($_FILES['first']['name'])){
        $fimagen=$_FILES['first']['name'];
        $ftimage = rand(0,15).preg_replace('/\s+/', '', $fimagen);
        $ftype=$_FILES['first']['type'];
        $ftmp=$_FILES["first"]["tmp_name"];
        if(substr($ftype,0,5)==="image"){
        $foo= new Upload($_FILES['first']);
        if ($foo->uploaded) {
        $foo->file_new_name_body = pathinfo($ftimage, PATHINFO_FILENAME);
        $foo->image_resize = true;
        $foo->image_x = 700;
        $foo->image_y = 700;
        $foo->Process('../_product_images');
        if($foo->processed){
            $foo->Clean();
            if(!empty($foldie)){
                unlink("../_product_images/".$foldie);
            }
            $f_img=$ftimage;
            $up = $conn->query("UPDATE `products` SET dimg1='$f_img' WHERE dpid='$proid'" );
        }else{
            $f_img=$foldie;
        }
    }
        }
    }

    if(!empty($_FILES['second']['name'])){
        $simagen=$_FILES['second']['name'];
        $stimage = rand(0,15).preg_replace('/\s+/', '', $simagen);
        $stype=$_FILES['second']['type'];
        $stmp=$_FILES["second"]["tmp_name"];
        if(substr($stype,0,5)==="image"){
        $foo= new Upload($_FILES['second']);
        if ($foo->uploaded) {
        $foo->file_new_name_body = pathinfo($stimage, PATHINFO_FILENAME);
        $foo->image_resize = true;
        $foo->image_x = 700;
        $foo->image_y = 700;
        $foo->Process('../_product_images');
        if($foo->processed){
            $foo->Clean();
            if(!empty($soldie)){
                unlink("../_product_images/".$soldie);
            }
            $s_img=$stimage;
            $up = $conn->query("UPDATE `products` SET dimg2='$s_img' WHERE dpid='$proid'" );
        }else{
            $s_img=$soldie;
        }
    }
        }
    }

    if(!empty($_FILES['third']['name'])){
        $timagen=$_FILES['third']['name'];
        $ttimage = rand(0,15).preg_replace('/\s+/', '', $timagen);
        $ttype=$_FILES['third']['type'];
        $ttmp=$_FILES["third"]["tmp_name"];
        if(substr($ttype,0,5)==="image"){
        $foo= new Upload($_FILES['third']);
        if ($foo->uploaded) {
        $foo->file_new_name_body = pathinfo($ttimage, PATHINFO_FILENAME);
        $foo->image_resize = true;
        $foo->image_x = 700;
        $foo->image_y = 700;
        $foo->Process('../_product_images');
        if($foo->processed){
            $foo->Clean();
            if(!empty($toldie)){
                unlink("../_product_images/".$toldie);
            }
            $t_img=$ttimage;
            $up = $conn->query("UPDATE `products` SET dimg3='$t_img' WHERE dpid='$proid'" );
        }else{
            $t_img=$toldie;
        }
    }
        }
    }

    if(!empty($_FILES['last']['name'])){
        $limagen=$_FILES['last']['name'];
        $ltimage = rand(0,15).preg_replace('/\s+/', '', $limagen);
        $ltype=$_FILES['last']['type'];
        $ltmp=$_FILES["last"]["tmp_name"];
        if(substr($ltype,0,5)==="image"){
        $foo= new Upload($_FILES['last']);
        if ($foo->uploaded) {
        $foo->file_new_name_body = pathinfo($ltimage, PATHINFO_FILENAME);
        $foo->image_resize = true;
        $foo->image_x = 700;
        $foo->image_y = 700;
        $foo->Process('../_product_images');
        if($foo->processed){
            $foo->Clean();
            if(!empty($loldie)){
                unlink("../_product_images/".$loldie);
            }
            $l_img=$ltimage;
            
        $up = $conn->query("UPDATE `products` SET dimg4='$l_img' WHERE dpid='$proid'" );
        }else{
            $l_img=$loldie;
        }
        }
        }
    }

    // $f_img=empty($f_img) ? $f_img :$f_img.',';
    // $s_img=empty($s_img) ? $s_img :$s_img.',';
    // $t_img=empty($t_img) ? $t_img :$t_img.',';
    // $l_img=empty($l_img) ? $l_img :$l_img;


if($up){
    $_SESSION['msgs']="Success! Image Updated";
    echo "<script>history.back();</script>";
}else{
    $_SESSION['msgs']="Image Update Failed";
    echo "<script>history.back();</script>";
}
} 



function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value,ENT_QUOTES);
    //$value=strip_tags($value);
    return $value;
}

?>

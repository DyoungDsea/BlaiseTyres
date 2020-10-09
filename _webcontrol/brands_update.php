<?php

    require("../conn.php");
    error_reporting(0);

    
    if($_SERVER["REQUEST_METHOD"]=="POST"):
        if(isset($_POST['login'])){
    if(!empty($_POST["name"])){
        $name = $conn->real_escape_string(test_values($_POST["name"]));
    }

    if(!empty($_POST["bname"])){
        $bname = $conn->real_escape_string(test_values($_POST["bname"]));
    }

    
    $id = $conn->real_escape_string(test_values($_POST["id"]));
    $imgb = $conn->real_escape_string(test_values($_POST["imgb"]));
    


    
    //validate image
    if(!empty($_FILES['img']['name'])){
        $transid=date('YmHis');
        include 'image_php/class.upload.php';
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker_brand.php");
        }
    }

    if(!empty($_FILES['img']['name'])){
        @unlink('../_brands_images/'.$imgb.'.jpg');
        $int = $conn->query("UPDATE `brands` SET  dcategory='$name', name='$bname', img='$picid' WHERE id='$id' ");
        if($int){
            $_SESSION['msgs']="Brand updated suceessfully";
            header("Location:brands");
        }else{
            $_SESSION['msgs']="Brand update failed"; 
            header("Location:brands");
        }
    }else{
        $int = $conn->query("UPDATE `brands` SET  dcategory='$name', name='$bname' WHERE id='$id' ");
        if($int){
            $_SESSION['msgs']="Brand updated suceessfully";
            header("Location:brands");
        }else{
            $_SESSION['msgs']="Brand update failed"; 
            header("Location:brands");
        }
    }

}

endif;




    function test_values($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data,ENT_QUOTES);
        // $data = empty($data);
        return $data;
    }





?>
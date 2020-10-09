<?php

    require("../conn.php");
    error_reporting(0);

    $transid=date('YmHis');
    $transids=date('YmHi');
    include 'image_php/class.upload.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"):
        if(isset($_POST['login'])){
    if(!empty($_POST["name1"])){
        $name1 = $conn->real_escape_string(test_values($_POST["name1"]));
    }

    if(!empty($_POST["name2"])){
        $name2 = $conn->real_escape_string(test_values($_POST["name2"]));
    }

    if(!empty($_POST["name3"])){
        $name3 = $conn->real_escape_string(test_values($_POST["name3"]));
    }

    if(!empty($_POST["cap"])){
        $cap = $conn->real_escape_string(test_values($_POST["cap"]));
    }

    if(!empty($_POST["url"])){
        $url = $conn->real_escape_string(test_values($_POST["url"]));
    }

    //validate image
    if(!empty($_FILES['img']['name'])){
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker.php");
        }
    }

    if(!empty($_FILES['imgs']['name'])){
        $imgs = $conn->real_escape_string(test_values($_FILES['imgs']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['imgs']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picids=$transids.'-1';
        $foo = new Upload($_FILES['imgs']);            
        include("image_php/image_maker_mobile.php");
        }
    }



    
        $int = $conn->query("INSERT INTO `dslide` SET dslide_id='$transid', dtitle1='$name1', dtitle2='$name2', dtitle3='$name3', dimg='$picid', dmobile='$picids', dcaption='$cap', durl='$url' ");
        if($int){
            $_SESSION['msg']="Slide added suceessfully";
            header("Location:manage-carousel");
        }else{
            $_SESSION['msg']="Slide insertion failed"; 
            header("Location:manage-carousel");
        }
    

}

endif;




    function test_values($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        // $data = empty($data);
        return $data;
    }





?>
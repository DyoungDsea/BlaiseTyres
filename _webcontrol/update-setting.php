<?php

    require("../conn.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"):
        if(isset($_POST['updated'])){

    if(!empty($_POST["desc"])){
        $desc = $conn->real_escape_string($_POST["desc"]);
    }

    $id = $conn->real_escape_string(test_values($_POST["id"]));
    $imgb = $conn->real_escape_string(test_values($_POST["imgb"]));

    if(!empty($_FILES['img']['name'])){
        $transid=date('YmHis');
        include 'image_php/class.upload.php';
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image-maker-about.php");
        }
        @unlink('../_slide_images/'.$imgb.'.jpg');
    
        $int = $conn->query("UPDATE`blaise_set` SET ddesc='$desc', dimg='$picid' WHERE bid='$id' ");
        if($int){
            $_SESSION['msgs']="Updated suceessfully";
            header("Location:settings");
        }else{
            $_SESSION['msg']="Oops!, try again later"; 
            header("Location:settings");
        }

    }else{
        $int = $conn->query("UPDATE`blaise_set` SET ddesc='$desc' WHERE bid='$id' ");
        if($int){
            $_SESSION['msgs']="Updated suceessfully";
            header("Location:settings");
        }else{
            $_SESSION['msg']="Oops!, try again later"; 
            header("Location:settings");
        }
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
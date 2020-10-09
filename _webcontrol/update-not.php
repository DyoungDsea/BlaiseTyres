<?php

    require("../conn.php");
    error_reporting(0);

    $transid=date('YmHis');
    $transids=date('YmHi');
    include 'image_php/class.upload.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"):
        if(isset($_POST['update'])){

    if(!empty($_POST["name1"])){
        $name1 = $conn->real_escape_string(test_values($_POST["name1"]));
    }

    if(!empty($_POST["name2"])){
        $name2 = $conn->real_escape_string($_POST["name2"]);
    }

    if(!empty($_POST["name3"])){
        $name3 = $conn->real_escape_string($_POST["name3"]);
    }else{
        $name3 ='';
    }

    $id = $conn->real_escape_string($_POST["id"]);
    $start = $conn->real_escape_string($_POST["start"]);
    $end = $conn->real_escape_string($_POST["end"]);

    //validate image
    
  if(!empty($_FILES['img']['name'])){
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);       
        include("image_php/image_maker-blog.php");
        }
    }


  if(empty($_FILES['img']['name'])){
        $int = $conn->query("UPDATE `notifivcation` SET dtitle='$name1', durl='$name3', ddesc='$name2', dstart='$start', dend='$end'  WHERE notid='$id' ");
        if($int){
            $_SESSION['msgs']="Updated suceessfully";
            header("Location:notification");
        }else{
            $_SESSION['msg']="Oops!, try again later"; 
            header("Location:notification");
        }
    

    }elseif(!empty($_FILES['img']['name'])){
        @unlink('../_slide_blog/'.$_POST['himg'].'.jpg');
        $int = $conn->query("UPDATE `notifivcation` SET dtitle='$name1', durl='$name3', ddesc='$name2', dimg='$picid', dstart='$start', dend='$end'  WHERE notid='$id' ");
            if($int){
                $_SESSION['msgs']="Updated suceessfully";
                header("Location:notification");
            }else{
                $_SESSION['msg']="Oops!, try again later"; 
                header("Location:notification");
            }
        
    }else{
        echo "No";
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
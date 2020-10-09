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


    $transid=date('YmHis');
    include 'image_php/class.upload.php';

    //validate image
    if(!empty($_FILES['img']['name'])){
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker_brand.php");
        }
    }

    
        $int = $conn->query("INSERT INTO `brands` SET  dcategory='$name', name='$bname', img='$picid' ");
        if($int){
            $_SESSION['msgs']="Brand added suceessfully";
            header("Location:brands");
        }else{
            $_SESSION['msgs']="Brand insertion failed"; 
            header("Location:brands");
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
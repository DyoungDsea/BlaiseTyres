<?php

    require("../conn.php");
    error_reporting(0);

    $transid=date('YmHis');
    $transids=date('Y m d h:i:s');
    include 'image_php/class.upload.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"):
        if(isset($_POST['login'])){
    if(!empty($_POST["name1"])){
        $name1 = $conn->real_escape_string(test_values($_POST["name1"]));
    }

    if(!empty($_POST["name2"])){
        $name2 = $conn->real_escape_string($_POST["name2"]);
    }

   
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


    
        $int = $conn->query("INSERT INTO `dblog` SET dblog_id='$transid', dtitle='$name1', ddesc='$name2', dimg='$picid', ddate='$transids' ");
        if($int){
            $_SESSION['msgs']="Blog added suceessfully";
            header("Location:blog");
        }else{
            $_SESSION['msg']="Blog insertion failed"; 
            header("Location:blog");
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
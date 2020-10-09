<?php


    if(empty($_POST["id"])){
        $error = 'ID is required.';
    }else {
        $id = $conn->real_escape_string(test_values($_POST["id"]));
    }

    if(empty($_POST["name"])){
        $error = 'Name is required.';
    }else {
        $name = $conn->real_escape_string(test_values($_POST["name"]));
    }

    if(empty($_POST["pname"])){
        $error = 'Product name is required.';
    }else {
        $pname = $conn->real_escape_string(test_values($_POST["pname"]));
    }
    if(empty($_POST["city"])){
        $error = 'City is required.';
    }else {
        $city = $conn->real_escape_string(test_values($_POST["city"]));
    }

    if(empty($_POST["text"])){
        $error = 'Tesimony is required.';
    }else {
        $text = $conn->real_escape_string(test_values($_POST["text"]));
    }

    $transid=date('YmHis');
    include 'image_php/class.upload.php';
    //validate image
    if (empty($_FILES['img'])) {
        $errors = "Image is required";
    }else{
        $imgs = $conn->real_escape_string(test_values($_FILES['img']['name']));
        @list(, , $imtype, ) = getimagesize($_FILES['img']['tmp_name']); 
        if ($imtype == 3 or $imtype == 2 or $imtype == 1) {          
        $picid=$transid.'-1';
        $foo = new Upload($_FILES['img']);            
        include("image_php/image_maker.php");
        }else{
            $errors = "Image must be JPG or PNG";
        }

    }



    if(empty($error) && empty($_FILES['img']['name'])){
        $int = $conn->query("UPDATE testimonial SET name='$name', product_name='$pname', city='$city', text='$text' WHERE id='$id' ");
        if($int){
            $_SESSION['msgs']="Testimony was added";
        }else{
            $_SESSION['msg']="Testimony insertion failed"; 
        }
    }else{
        @unlink('../testimonial-image/'.$_POST['himg'].'.jpg');
        $int = $conn->query("UPDATE testimonial SET name='$name', product_name='$pname', img='$picid', city='$city', text='$text' WHERE id='$id' ");
        if($int){
            $_SESSION['msgs']="Testimony was added";
        }else{
            $_SESSION['msg']="Testimony insertion failed"; 
        }
    }


    function test_values($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        // $data = empty($data);
        return $data;
    }





?>
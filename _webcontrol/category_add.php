<?php
session_start();
require("../conn.php");
if(!empty($_POST['name'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id;
    $name=clean_up($_POST['name']);
    $created_at;
    $updated_at;
    $status;   

    $q = $conn->query("INSERT INTO categories SET name='$name'");
    if($q){
        $_SESSION['msgs']="Category was added"; 
    }else{
            $_SESSION['msg']="Category insertion failed"; 
        }    
        header("Location: categories");
}else{
    header("Location: index");
}
?>
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
    $name=clean_up($_POST['name'],ENT_QUOTES);
    $cat=clean_up($_POST['cat'],ENT_QUOTES);
    $created_at;
    $updated_at;
    $status;   

    $q = $conn->query("INSERT INTO sub_categories SET dcategory='$cat', name='$name'");
    if($q){
        $_SESSION['msgs']="Category was added"; 
    }else{
            $_SESSION['msgs']="Category insertion failed"; 
        }    
        header("Location: sub-categories");
}else{
    header("Location: index");
}
?>
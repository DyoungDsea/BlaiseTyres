<?php
session_start();
require("../conn.php");
if(!empty($_POST['status'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id;
    $status=$_POST['status'];  
        $query=$conn->prepare("insert into transaction values(?,?)");
        $query->bind_param('is',$id,$status);
        if($query->execute()){
            $_SESSION['msg']="Status was inserted";        
        }else{
            $_SESSION['msg']="Status insertion failed"; 
        }    
        header("Location: transactions");
}else{
    header("Location: index");
}
?>
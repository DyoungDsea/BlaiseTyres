<?php
session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->prepare("delete from payment where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msg']="Status was deleted";           
        }else{
            $_SESSION['msg']="Status deletion failed"; 
        }    
        header("Location: payments");
}else{
    header("Location: index");
}
?>
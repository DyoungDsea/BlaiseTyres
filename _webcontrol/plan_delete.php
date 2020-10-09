<?php
session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->prepare("delete from plans where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msg']="Plan was deleted";           
        }else{
            $_SESSION['msg']="Plan deletion failed"; 
        }    
        header("Location: plans");
}else{
    header("Location: index");
}
?>
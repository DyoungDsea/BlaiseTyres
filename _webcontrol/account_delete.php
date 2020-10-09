<?php
session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $query=$conn->prepare("delete from login where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Account was deleted";           
        }else{
            $_SESSION['msg']="Account deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
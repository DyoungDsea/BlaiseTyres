<?php
session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->prepare("delete from `dblog` where dblog_id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            unlink('../_slide_blog/'.$_GET['img'].'.jpg');
            $_SESSION['msgs']="Blog was deleted";           
        }else{
            $_SESSION['msg']="Blog deletion failed"; 
        }    
        header("Location: blog");
}else{
    header("Location: index");
}
?>
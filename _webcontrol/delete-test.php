<?php
session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->prepare("delete from `dslide` where dslide_id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            unlink('../_slide_images/'.$_GET['himg'].'.jpg');
            unlink('../_slide_images/'.$_GET['mob'].'.jpg');
            $_SESSION['msg']="Slide was deleted";           
        }else{
            $_SESSION['msg']="Slide deletion failed"; 
        }    
        header("Location: manage-carousel");
}else{
    header("Location: index");
}
?>
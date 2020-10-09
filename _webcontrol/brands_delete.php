<?php
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];  
    $imgb=$_GET['img'];  
    
    @unlink('../_brands_images/'.$imgb.'.jpg');  
        $query=$conn->prepare("UPDATE brands SET status='inactive' where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Brand was deleted";           
        }else{
            $_SESSION['msgs']="Brand deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
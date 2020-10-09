<?php
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];    
        $query=$conn->prepare("UPDATE sub_categories SET status='inactive' where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Sub Category was deleted";           
        }else{
            $_SESSION['msgs']="Sub Category deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
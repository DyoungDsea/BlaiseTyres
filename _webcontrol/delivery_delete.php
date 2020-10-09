<?php
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];  
     
        $query=$conn->prepare("UPDATE ddelivery SET status='inactive' where id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Delivery option was deleted";           
        }else{
            $_SESSION['msgs']="Delivery option deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
<?php
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];  
        $query=$conn->prepare("DELETE FROM drating where drat_id=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Deleted successfully";           
        }else{
            $_SESSION['msg']="Oops!, try again later"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
<?php
// session_start();
require("../conn.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
        $id=$_GET['id'];
        $img=$_GET['img'];
        $img1=$_GET['img1'];
        $img2=$_GET['img2'];
        $img3=$_GET['img3'];

        @unlink("../_product_images/".$img);
        @unlink("../_product_images/".$img1);
        @unlink("../_product_images/".$img2);
        @unlink("../_product_images/".$img3);
        $query=$conn->prepare("DELETE from products where dpid=?");
        $query->bind_param('i',$id);
        if($query->execute()){
            $_SESSION['msgs']="Product was deleted";           
        }else{
            $_SESSION['msgs']="Product deletion failed"; 
        }    
        echo "<script>history.back();</script>";
}else{
    header("Location: index");
}
?>
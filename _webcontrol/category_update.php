<?php
require_once("../conn.php");
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(isset($_POST['log'])){	
    $query=$conn->prepare("update categories set name=?,updated_at=? where id=?");
    $query->bind_param('ssi',$name,$updated_at,$id);
    $id=clean_up($_POST['id']);
    $name=clean_up($_POST['name']);
    $names=clean_up($_POST['names']);
    $updated_at;
    if($query->execute()){

        $conn->query("UPDATE `brands` SET dcategory='$name' WHERE dcategory='$names'");
        $conn->query("UPDATE `products` SET dcategory='$name' WHERE dcategory='$names'");
        $conn->query("UPDATE `sub_categories` SET dcategory='$name' WHERE dcategory='$names'");

        $_SESSION['msgs']="Category Updated";
    }else{
        $_SESSION['msgs']="Failed to update category";
    }    
    echo "<script>history.back();</script>";
}else{
	header("Location: index");
}
 ?>

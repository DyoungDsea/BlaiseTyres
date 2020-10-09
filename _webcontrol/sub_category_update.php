<?php
require_once("../conn.php");
        function clean_up($value){
            $value=trim($value);
            $value=htmlspecialchars($value);
            $value=strip_tags($value);
            return $value;
        }
if(isset($_POST['log'])){	
    $query=$conn->prepare("update sub_categories set dcategory=?,name=?,updated_at=? where id=?");
    $query->bind_param('sssi',$cat,$name,$updated_at,$id);
    $id=clean_up($_POST['id'],ENT_QUOTES);
    $name=clean_up($_POST['name'],ENT_QUOTES);
    $cat=clean_up($_POST['cat'],ENT_QUOTES);
    $updated_at;
    if($query->execute()){
        $_SESSION['msgs']="Sub Category Updated";
    }else{
        $_SESSION['msgs']="Failed to update sub category";
    }    
    echo "<script>history.back();</script>";
}else{
	header("Location: index");
}
 ?>

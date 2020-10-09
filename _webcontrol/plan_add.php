<?php
session_start();
require("../conn.php");
if(!empty($_POST['plan']) && !empty($_POST['extension'])){ 
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
    $id;
    $plan=$_POST['plan']; 
    $extension=$_POST['extension'];    
        $query=$conn->prepare("insert into plans values(?,?,?,?)");
        $query->bind_param('isis',$id,$plan,$extension,$created_at);
        if($query->execute()){
            $_SESSION['msg']="Plan was inserted";        
        }else{
            $_SESSION['msg']="Plan insertion failed"; 
        }    
        header("Location: plans");
}else{
    header("Location: index");
}
?>
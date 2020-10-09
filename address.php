<?php
require("conn.php");
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     //check if the input values are empty
     if(isset($_POST['log'])){
        if(!empty($_POST['add'])){
         $n = $conn->real_escape_string($_POST['add']);  
        $id = $conn->real_escape_string($_SESSION['userid']);
        
        $sql=$conn->query("UPDATE login SET daddress='$n' WHERE userid='$id'");
        if($sql){
            $_SESSION['msgs']="Address updated successfully.";
            header("Location: dashboard"); 
        }else{
            $_SESSION['msg']="Oops! try again later.";
            header("Location: dashboard"); 
        }
    }
}else{
    $_SESSION['msg']="Oops! try again later.";
            header("Location: dashboard");
}

 }
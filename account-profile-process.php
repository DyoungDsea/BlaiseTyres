<?php
require("conn.php");
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     //check if the input values are empty
     if(!empty($_POST['name'])){
         $n = $conn->real_escape_string($_POST['name']);  
        $p = $conn->real_escape_string($_POST['phone']);
        $id = $conn->real_escape_string($_SESSION['userid']);
        
        $sql=$conn->query("UPDATE login SET dname='$n', dphone='$p' WHERE userid='$id'");
        if($sql){
            $_SESSION['msgs']="Profile updated successfully.";
            header("Location: account-profile"); 
        }else{
            $_SESSION['msg']="Oops! try again later.";
            header("Location: account-profile"); 
        }
    }

 }
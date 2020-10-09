<?php
require("../../conn.php");
include 'clean.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $id = clean_up($_POST['id']);

if(isset($_POST['edit'])){
     //check if the input values are empty
     if(!empty($_POST['name'])){
         $n = clean_up($_POST['name']);
     }else{
         $error= 'Fullname is required';
     }
     if(!empty($_POST['email'])){
        $e = clean_up($_POST['email']);
    }else{
        $error= 'Email is required';
    }
    if(!empty($_POST['phone'])){
        $p = clean_up($_POST['phone']);
    }else{
        $error= 'Phone is required';
    }
    
    if(empty($error)){
        $sql=$conn->query("UPDATE `_security` SET uname='$n', email='$e', dphone='$p' WHERE userid='$id'");
        if($sql){
            // $_SESSION['i']= true;
            $_SESSION['msgs']="Edited successfully.";
            header("Location: ../index");
        }else{
            $_SESSION['msg']="Failed!..try again later";
            header("location: ../index");
            }
    }

 }


 
if(isset($_POST['edited'])){
    //check if the input values are empty
    if(!empty($_POST['name'])){
        $n = clean_up($_POST['name']);
    }else{
        $error= 'Fullname is required';
    }
    if(!empty($_POST['email'])){
       $e = clean_up($_POST['email']);
   }else{
       $error= 'Email is required';
   }
   if(!empty($_POST['phone'])){
       $p = clean_up($_POST['phone']);
   }else{
       $error= 'Phone is required';
   }
   
   if(empty($error)){
       $sql=$conn->query("UPDATE `_security` SET uname='$n', email='$e', dphone='$p' WHERE userid='$id'");
       if($sql){
           // $_SESSION['i']= true;
           $_SESSION['msgs']="Edited successfully.";
           header("Location: ../index");
       }else{
           $_SESSION['msg']="Failed!..try again later";
           header("location: ../index");
           }
   }

}



 if(isset($_POST['edit-add'])){

    if(!empty($_POST['add'])){
            $add =clean_up($_POST['add']);
        }else{
            $error= 'Address is required';
        }
        if(empty($error)){
            $sql=$conn->query("UPDATE `scheme_users` SET address='$add' WHERE user_id='$id'");
            if($sql){
                // $_SESSION['i']= true;
                $_SESSION['msgs']="Updated successfully.";
                header("Location: ../index");
            }else{
                $_SESSION['msg']="Failed!..try again later";
                header("location: ../index");
                }
        }
 }








}
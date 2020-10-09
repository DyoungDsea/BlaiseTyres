<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] =="POST") {

        $email = $conn->real_escape_string($_POST["email"]);
        $userid = $conn->real_escape_string($_POST["userid"]);
        $pill = $conn->real_escape_string(md5($_POST["pass"]));
    
        $sql=$conn->query("UPDATE login SET dpass='$pill' WHERE demail='$email' AND userid='$userid' AND dstatuss='active'");
        if($sql){
            $boo = $conn->query("SELECT * FROM login WHERE userid ='$userid'")->fetch_assoc();
            $_SESSION['userid']=$boo['userid'];
			$_SESSION['logged'] = true;
            if(isset($_SESSION['current'])){
                header("Location: ". $_SESSION['current']);
                }else{
                header("Location: dashboard");    
                }
        }else{
            header("Location: reset?email=$email&userid=$userid"); 
            $_SESSION['msgs'] = "Oops! Incorrect details, try again.";
        }
    }else{
        header("Location: reset?email=$email&userid=$userid");
        $_SESSION['msgs'] = "Oops! Something went wrong, try again.";
    }
 



?>
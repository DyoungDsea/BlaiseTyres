<?php
// session_start();
require_once("conn.php");
require_once("clean.php");
if(isset($_POST['log'])){
	$email=clean($_POST['email']);
	// $pass=clean($_POST['pass']);	
	$passu=clean(md5($_POST['pass']));	
	$query=$conn->query("SELECT * FROM login WHERE demail='$email' AND dpass='$passu' AND dstatuss='active'");
 	if($query->num_rows>0){
    $d = $query->fetch_assoc();
    // echo 'yes';
	        $_SESSION['userid']=$d['userid'];
			$_SESSION['logged'] = true;
		
			if(isset($_SESSION['current'])){
			header("Location: ". $_SESSION['current']);
			}else{
			header("Location: dashboard");    
			}
		
	}else{
		$query=$conn->query("SELECT * FROM `_security` WHERE email='$email' AND pword='$passu' AND status='offline'");
        if($query->num_rows>0){
        $d = $query->fetch_assoc();
        
                $_SESSION['admin']=$d['userid'];
                $_SESSION['logged_'] = true;
            
                header("Location: _webcontrol/index");
            
        }else{
            $_SESSION["msg"]="Oops! Invalid inputs";
			header("Location: login"); 
        }
	}
}else{
		header("Location: index");
	}
 ?>

<?php
// session_start();
// require 'phpfiles/db.php';
require_once("conn.php");
	if ($_SERVER["REQUEST_METHOD"] =="POST") {
    
        if (empty($_POST["email"])) {
            $_SESSION['msg']='Email is required.';
                $eerr = 'Email is required.';
            }else{
                $em = $conn->real_escape_string(test_values($_POST["email"]));			
            }

            
            if(empty($eerr)){
                $sql = $conn->query("SELECT * FROM login WHERE demail='$em'");
                if($sql->num_rows>0){
                    $row = $sql->fetch_assoc();                         
                        // header("location:verify.php");    
                                $_SESSION['msgsx']="<p class='text-center text-success'>Reset link have been sent to you email.
                                    Please login to ".$em." and reset your password</p>";
                                    // Always set content-type when sending HTML email

                                // More headers 

                                $headers = "From: blaisetyres.com\r\n";
                                $headers .= "Reply-To: blaisetyres.com\r\n";
                                $headers .= "CC: blaisetyres.com\r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
                                $to = $em;
                                $headers .= "Account Rest: ";
                                $subject = 'Account reset(blaisetyres.com)';
                                $message_body = 'Hello '.$row['dname'].',  
                                please click this link to reset your password:
                                <a href="https://blaisetyres.com/reset?email='.$em.'&userid='.$row['userid'].'">Reset Password</a>';
                                // mail($to,$header, $subject);
                                mail($to,$subject,$message_body,$headers);
                
                header("location: forgot");
            }else{
                //error page if user is not yet register or have not activate his account.
                $_SESSION['msg'] = "<p>Oops! This account does not exist</p>";
                // header("location:error") ;
            }
        }

        



}

    //function to test input
function test_values($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
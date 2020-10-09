<?php


require("conn.php");

if($_SERVER["REQUEST_METHOD"]=="POST"):
    
if(isset($_POST['log'])){
    $em = $conn->real_escape_string(test_values($_SESSION['userid']));
    // validate password    
    $pass=md5(test_values($_POST['pass']));
    $cpass=md5(test_values($_POST['cpass']));

if($pass=== $cpass){
   //validate password old and check if user with hash password match
   if(!empty($_POST["opass"])){
        $old= $conn->real_escape_string(test_values($_POST['opass']));
        $oldpass = md5($_POST["opass"]);
        //check existence of old password
        $sql = $conn->query("SELECT * FROM login WHERE userid='$em' AND dpass='$oldpass'");
        if($sql->num_rows > 0){
                $up = $conn->query("UPDATE login SET dpass='$pass' WHERE userid='$em'");
                if($up){
                    $_SESSION['msgs']="Password changed successfully.";
                    header("location: account-password");
                }
            }else{
                $_SESSION['msg'] = "Old password do not match ";
                header("location: account-password");
            }
        }

    } else{
    $_SESSION['msg']="Passwords do not match.";
    header("location: account-password");
}

}

endif;

function test_values($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
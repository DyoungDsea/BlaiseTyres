
<?php

require 'conn.php';
if(isset($_POST['message'])){
$users = $conn->real_escape_string($_SESSION['userid']);
$cop = $conn->query("SELECT * FROM `dship_address` WHERE userid='$users' AND dstatus='yes'")->fetch_assoc();
// $_SESSION['ship_id']=$cop['dship_id'];
$_SESSION['ship_address']=$cop['daddress'];
unset($_SESSION["Address"]);

}

<?php
session_start();
// error_reporting(0);
//check whether on localhost or online
$localhost = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "");
define('DB_ENGINE', "jstockin_blaise");
}
else {
define('DB_SERVER', "localhost");
define('DB_USER', "tyrezghb_server");
define('DB_PASSWORD', "blaiseautocare100@");
define('DB_ENGINE', "tyrezghb_blaise");
}

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_ENGINE);

if ($conn->connect_error) {
    trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

putenv("TZ=Africa/Lagos");

$dsett = mysqli_query($conn, "select * FROM _security where id='1'") or die(mysqli_error($conn));
while($irow = $dsett->fetch_assoc()){
$dcompany=$irow['dcompany'];
$dlogo=$irow['dlogo'];
$dcomm_address=$irow['address'];
$dcomm_phone=$irow['dphone'];
$dcomm_phone2=$irow['dphone2'];
$dcomm_email=$irow['demail'];
$currency=$irow['icurrency'];
$web_title=$irow['dtitle'];
$web=$irow['dwebsite'];

$aboutus=$irow['aboutus'];
$dterms=$irow['dterms'];
$dservices=$irow['dservices'];

//social urls
$sfb=$irow['social_fb'];
$stw=$irow['social_tw'];
$sin=$irow['social_in'];
$syt=$irow['social_gp'];
$slk=$irow['social_lk'];
$you=$irow['social_you'];
$nname="blaisetyres";
$next="blaisetyres.com";
$rand=date('his');
}
require("last_seen.php");

function discount($num, $price){
    $nums = ((Float)$num / 100) * $price;
    $nums = $price - $nums;
    return $nums;
}

//include 'star-rating.php';

?>


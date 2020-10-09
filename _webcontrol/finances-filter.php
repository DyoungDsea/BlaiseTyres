<?php
session_start();
require_once("../conn.php");
if(isset($_POST['Search'])){       
    $start=clean_up($_POST['date1']);
    $end=clean_up($_POST['date2']);
    header("Location: financials?start=$start&end=$end");
}



function clean_up($value){
    $value=trim($value);
    $value=htmlspecialchars($value);
    $value=strip_tags($value);
    return $value;
}

?>
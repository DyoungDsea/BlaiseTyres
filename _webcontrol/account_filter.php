<?php
session_start();
require_once("../conn.php");
if(isset($_POST['name'])){
    function clean_up($value){
        $value=trim($value);
        $value=htmlspecialchars($value);
        $value=strip_tags($value);
        return $value;
    }
  $name=clean_up($_POST['name']);  
     header("Location: accounts?name=$name");

}
else{
  header("Location: index");
}
?>

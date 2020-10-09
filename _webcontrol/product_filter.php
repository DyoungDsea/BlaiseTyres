<?php
// session_start();
// require_once("../conn.php");
if(isset($_POST['pro_name'])){
  $pro_name = $_POST['pro_name'];
     header("Location: products?pro_name=$pro_name");  
}
else{
  header("Location: index");
}
?>

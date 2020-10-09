<?php
require '../../conn.php';


if(isset($_POST['staff'])){
  $id=clean_up($_POST['id']);
      $query=$conn->query(" DELETE FROM `_security` WHERE userid='$id' ");
      if($query){            
          $_SESSION['msgs']="Delete successfully";
        header("location: ../new-staff"); 
      }else{
        $_SESSION['msgs']="Oops!..try again later";
        header("location: ../new-staff");
      }
  
}

function clean_up($value){
  GLOBAL $conn;
      $value=trim($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);
      $value = $conn->real_escape_string($value);
      return $value;                
  }
 


?>
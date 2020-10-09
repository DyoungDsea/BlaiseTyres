<?php

require("../conn.php");
function clean($value){
    require("../conn.php");
      $value=trim($value);
      $value=htmlspecialchars($value);
      $value=strip_tags($value);
      $value = $conn->real_escape_string($value,ENT_QUOTES);
      return $value;                
  }
  
?>
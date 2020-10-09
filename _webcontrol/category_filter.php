<?php
session_start();
require_once("../conn.php");
if(isset($_POST['name'])){   
  $name=clean_up($_POST['name']);
  $start=clean_up($_POST['date']);
  $end=clean_up($_POST['date2']);
  if($start>$end){
    $_SESSION['msg']="Start date exceeds End date";
    echo "<script>history.back();</script>";
  }
  else{
     header("Location: categories?name=$name");
  }
}elseif(isset($_POST['names'])){
 
$name=clean_up($_POST['names']);
if($start>$end){
  $_SESSION['msgs']="Start date exceeds End date";
  echo "<script>history.back();</script>";
}
else{
   header("Location: sub-categories?name=$name");
}
}
elseif(isset($_POST['nameb'])){
  
$name=clean_up($_POST['nameb']);
if($start>$end){
  $_SESSION['msgs']="Start date exceeds End date";
  echo "<script>history.back();</script>";
}
else{
   header("Location: brands?name=$name");
}
}

elseif(isset($_POST['named'])){
  
  $name=clean_up($_POST['named']);
  if($start>$end){
    $_SESSION['msgs']="Start date exceeds End date";
    echo "<script>history.back();</script>";
  }
  else{
     header("Location: manage-delivery?name=$name");
  }
  }elseif(isset($_POST['namedr'])){
  
    $name=clean_up($_POST['namedr']);
    if($start>$end){
      $_SESSION['msgs']="Start date exceeds End date";
      echo "<script>history.back();</script>";
    }
    else{
       header("Location: star-rating?name=$name");
    }
    }

else{
  header("Location: index");
}


function clean_up($value){
  $value=trim($value);
  $value=htmlspecialchars($value);
  $value=strip_tags($value);
  return $value;
}
?>

<?php
session_start();
require_once("../conn.php");
if(isset($_POST['pro_name']) || isset($_POST['proc_name']) || isset($_POST['proc_namer']) || isset($_POST['proc_namex'])  || isset($_POST['proc_namep']) || isset($_POST['proc_names']) || isset($_POST['prod_name']) || isset($_POST['pror_name']) || isset($_POST['proca_name'])  || isset($_POST['pro_namei']) ){
    if(isset($_POST['pro_name'])){       
        $pro_name=clean_up($_POST['pro_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-pending?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['proc_name'])){
        $pro_name=clean_up($_POST['proc_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-fulfilled?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['proc_names'])){
        $pro_name=clean_up($_POST['proc_names']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-pending-a?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['proc_namep'])){
        $pro_name=clean_up($_POST['proc_namep']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-shipped?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['proc_namer'])){
        $pro_name=clean_up($_POST['proc_namer']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-allocated?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['proc_namex'])){
        $pro_name=clean_up($_POST['proc_namex']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-cancel?pro_name=$pro_name&start=$start&end=$end");
    }elseif(isset($_POST['prod_name'])){
        $pro_name=clean_up($_POST['prod_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-allocated?pro_name=$pro_name&start=$start&end=$end");

    }elseif(isset($_POST['pror_name'])){
        $pro_name=clean_up($_POST['pror_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-cancel?pro_name=$pro_name&start=$start&end=$end");

    }elseif(isset($_POST['pro_namei'])){
        $pro_name=clean_up($_POST['pro_namei']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: sub-inactive?pro_name=$pro_name&start=$start&end=$end");

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

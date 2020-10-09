<?php
session_start();
require_once("../conn.php");
if(isset($_POST['pro_name']) || isset($_POST['proc_name'])|| isset($_POST['proc_names'])|| isset($_POST['proc_namesp'])|| isset($_POST['prod_name']) || isset($_POST['pror_name']) || isset($_POST['proca_name']) || isset($_POST['procp_name']) || isset($_POST['pro_nameap']) || isset($_POST['pro_nameca']) ){
    if(isset($_POST['pro_name'])){       
        $pro_name=clean_up($_POST['pro_name']);  
        header("Location: orders?pro_name=$pro_name");
    }else if(isset($_POST['proc_name'])){
        $pro_name=clean_up($_POST['proc_name']);  
        header("Location: processed?pro_name=$pro_name");
    }else if(isset($_POST['proc_names'])){
        $pro_name=clean_up($_POST['proc_names']);  
        header("Location: shipped?pro_name=$pro_name");
    }else if(isset($_POST['proc_namesp'])){
        $pro_name=clean_up($_POST['proc_namesp']);  
        header("Location: pay-on-delivery?pro_name=$pro_name");
    }elseif(isset($_POST['prod_name'])){
        $pro_name=clean_up($_POST['prod_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: delivered?pro_name=$pro_name");

    }elseif(isset($_POST['pror_name'])){
        $pro_name=clean_up($_POST['pror_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: returned?pro_name=$pro_name");

    }elseif(isset($_POST['proca_name'])){
        $pro_name=clean_up($_POST['proca_name']);
        $start=clean_up($_POST['date']);
        $end=clean_up($_POST['date2']);
        header("Location: cancelled?pro_name=$pro_name");

    }elseif(isset($_POST['procp_name'])){
        $pro_name=clean_up($_POST['procp_name']);
        header("Location: pending-depositor?pro_name=$pro_name");

    }elseif(isset($_POST['pro_nameap'])){
        $pro_name=clean_up($_POST['pro_nameap']);
        header("Location: approved-depositor?pro_name=$pro_name");

    }elseif(isset($_POST['pro_nameca'])){
        $pro_name=clean_up($_POST['pro_nameca']);
        header("Location: cancelled-depositor?pro_name=$pro_name");

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

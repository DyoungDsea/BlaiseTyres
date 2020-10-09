<?php
require 'conn.php';
include 'track.php';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
   
$trans_id = date("ymdhis");
$qtys=0;
    
    foreach($_SESSION["subscribe"] as $keys => $value){

        $userid = $_SESSION['userid'];
        $grand_total = $_SESSION['grand'];
        $location = $_SESSION['location'];
        
        if(isset($_SESSION['Address'])){
            $address = $_SESSION['Address'];
            //insert net address to user shipping address and set it to default
            $ship_id=date('YdmHis');  
            $conn->query("UPDATE dship_address SET dstatus='no' WHERE userid='$userid' ");     
            $sql = $conn->query("INSERT INTO `dship_address` SET userid='$userid', dship_id='$ship_id', daddress='$address', dstatus='yes' ");
        }else{
            $address = $_SESSION['ship_address'];
        }
    
        
        
        $cost = $_SESSION['costs'];
        $pid = $value['id'];
        $pname = $value['name'];
        $brand = $value['brand'];
        $sku = $value['sku'];
        $vcode = $value['vcode'];
        $img = $value['img'];        
        $qty = $value['qty'];
        $plan = $value['plan'];
        $price = $value['price'];
        $planNum = $value['planNum'];
        $qtys += $qty;
        $total = ($price * $qty) + $cost;
        $per_month = ceil((Float)$total/(Float)$planNum);
        // echo $userid.' '.$grand_total.' '.$pid.'<br>'.$pname.' '.$brand.' '.$sku.'<br>'.$vcode.' '.$img.' '.$qty.'<br> '.$plan.' '.$price.' '.$planNum.' '.$trans_id.$keys.' '.$location.' '.$per_month;

        $id = $trans_id.$keys;

        $sql =$conn->query("INSERT INTO dsub SET userid='$userid', subid='$id', pid='$pid', dimg='$img', pname='$pname', dsku='$sku', dbrand='$brand', dvcode='$vcode', dduration='$planNum', dqty='$qty', dprice='$price', dcharge='$cost', per_month='$per_month', dtotal='$total', dbalance='$total', dlocation='$location', daddress='$address' ");

        
    }
    
    if($sql){
        header("Location: subscription-payment?transaction_id=$id");
        unset($_SESSION["subscribe"]);
        unset($_SESSION["grand"]);
        unset($_SESSION["location"]);
        unset($_SESSION["cost"]);
        unset($_SESSION['Address']);
    }else{
        $_SESSION['msg']="Oops! try again later";
    }

}else{
    header("Location: login");
}

?>
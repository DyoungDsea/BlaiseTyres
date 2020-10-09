<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'clean.php';

    // $email=$_SESSION['email'];

            
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();

        //check if payment was successfull
        $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $payrefrence=$_SESSION['transid'];
    $url = 'https://api.paystack.co/transaction/verify/'.$payrefrence;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer sk_live_5b870121744e042e870166a2058b2c5012653e9c']
    );
    $request = curl_exec($ch);
    curl_close($ch);
    
    if ($request) {
        $result = json_decode($request, true);
    }

    $subid = clean($_SESSION['subid']);
    $total = clean($_SESSION['total']);
    $name = clean($_SESSION['pname']);
    $user = clean($_SESSION['userid']);
    $orderid = clean($_SESSION['orderid']);
    $order = date("ymdhis");
    
    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        //update database and set user payment
        $sql = $conn->query("SELECT * FROM `dsub` WHERE userid='$user' AND subid='$subid'")->fetch_assoc();
        $bal = (Float)$sql['amt_paid'] + (Float)$total;
        $dbalance = (Float)$sql['dbalance'] - (Float)$total;
        $dtotal = (Float)$sql['dtotal'];

        $d = $conn->query("SELECT * FROM login WHERE userid='$user'")->fetch_assoc();
       
            if($d['referrer'] != NULL){
                $referrer = $d['referrer'];
                $d = $conn->query("SELECT demail, dwallet FROM login WHERE userid='$referrer'")->fetch_assoc();
                $emails = $dd['demail'];
                $names = $dd['dname'];
                $wall = (Float)$dd['dwallet'];
                $percent = $reep['reef']/100;
                $res = $percent * $total;
                $final = $wall + $res;
                //update wallet
                $conn->query("UPDATE login SET dwallet='$final' WHERE userid='$referrer'");
                $subject="Referrer Bonus";
                $message="Hello ".$names.", your wallet has been credited with $res\r\n";
                $header= "From: ".$web." <".$dcomm_email.">";
                mail($emails,$subject,$message,$header);

            }

        if($bal >= $dtotal ){
        //Update amount paid
        $up = $conn->query("UPDATE dsub SET amt_paid='$bal', dtrans_status='completed', dbalance='$dbalance' WHERE userid='$user' AND subid='$subid'");
        $conn->query("INSERT INTO history SET amt_paid='$total', pname='$name', userid='$user', orderid='$order', dpid='$orderid' ") or die($conn->error());
        }else{
           //Update amount paid
        $up = $conn->query("UPDATE dsub SET amt_paid='$bal', dtrans_status='part', dbalance='$dbalance' WHERE userid='$user' AND subid='$subid'"); 
        $conn->query("INSERT INTO history SET amt_paid='$total', pname='$name', userid='$user', orderid='$order', dpid='$orderid' ") or die($conn->error());
        }
        $_SESSION['msgs']="Your payment was successful";
    }
    else{

        $_SESSION['msg']="Your payment was not successful...";
    }
//unset pay reference
unset($_SESSION['transid']);
unset($_SESSION['total']);
unset($_SESSION['pname']);
unset($_SESSION['orderid']);
//---------------
header("location: subscription-payment?transaction_id=$subid");
?> 
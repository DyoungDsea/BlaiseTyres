<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 

include("conn.php");
require 'clean.php';

    // $email=$_SESSION['email'];
        $orderid = clean($_SESSION['transid']);
        $userid = clean($_SESSION['userid']);
      
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();
        //check if payment was successfull
        $result = array();
    //The parameter after verify/ is the transaction reference to be verified
    $payrefrence=$orderid;
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

    $order = date("ymdhis");
    $email = clean($_SESSION['email']);
    $name = clean($_SESSION['name']);
    $orders = $_SESSION['orderid'];
    $ppname = $_SESSION['ppname'];
    $grand = $_SESSION['total-bill'];

    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        //update database and set user payment
        $d = $conn->query("SELECT * FROM login WHERE userid='$userid'")->fetch_assoc();
       
        if($d['referrer'] != NULL){
            $referrer = $d['referrer'];
            $d = $conn->query("SELECT demail, dwallet FROM login WHERE userid='$referrer'")->fetch_assoc();
            $emails = $dd['demail'];
            $names = $dd['dname'];
            $wall = (Float)$dd['dwallet'];
            $percent = $reep['reef']/100;
            $res = $percent * $grand;
            $final = $wall + $res;
            //update wallet
            $conn->query("UPDATE login SET dwallet='$final' WHERE userid='$referrer'");
            $subject="Referrer Bonus";
            $message="Hello ".$names.", your wallet has been credited with $res\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($emails,$subject,$message,$header);

        }
        
        $up = $conn->query("UPDATE `dcart_holder` SET payment_status='paid' WHERE orderid='$orders' AND userid='$userid' ");
        $conn->query("INSERT INTO history SET amt_paid='$grand', pname='$ppname', userid='$userid', orderid='$orderid', dpid='$order' ") or die($conn->error());
        $to = $email;
        $subject="Order Placed";
        $message="Hello ".$name.", your order  has been received. this is your tracking ID: $orderid \r\n";
        $header= "From: ".$web." <".$dcomm_email.">";
        mail($email,$subject,$message,$header);
        // $dcomm_email;
        $messages = "Order has been placed by $name, tracking ID:  $orderid \r\n";

        mail($dcomm_email,$subject,$messages);
        
        $_SESSION['msgs']="Your order has been placed";
    }
    else{

        $_SESSION['msg']="Your payment was not successful!";
    }
//unset pay reference
unset($_SESSION['transid']);
unset($_SESSION['budget']);
unset($_SESSION['locationx']);
unset($_SESSION['grandx']);
unset($_SESSION['costx']);
unset($_SESSION['costsx']);
unset($_SESSION['name']);
unset($_SESSION['email']);
//---------------
header("location: account-direct-purchases");
?> 
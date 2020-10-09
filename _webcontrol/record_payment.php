<?php
require_once 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        if(!empty($_POST['ref'])){
            $ref = $conn->real_escape_string($_POST['ref']);
            }else{
                $err = 'Error';
            }

        if(!empty($_POST['order'])){
                $order = $conn->real_escape_string($_POST['order']);
            }else{
                $err = 'Error';
            }

        if(isset($_POST['amt-paid'])){
                $last_amt_paid = $conn->real_escape_string((Float)$_POST['amt-paid']);
            }else{
                $err = 'Error';
            }

        if(isset($_POST['price'])){
            $price = $conn->real_escape_string((Float)$_POST['price']);
            }else{
                $err = 'Error';
            }

        if(isset($_POST['bal'])){
                $bal = $conn->real_escape_string((Float)$_POST['bal']);
            }else{
                $err = 'Error';
            }

        if(!empty($_POST['pay'])){
            $pay = $conn->real_escape_string($_POST['pay']);
            if(is_numeric($_POST['pay'])){
                $current_pay = $conn->real_escape_string((Float)$_POST['pay']);
                $update_amt_paid = $last_amt_paid + $current_pay;
                if($update_amt_paid > $price){
                    $err = '<p class="text-danger">Sorry! the amount entered is more than customer\'s balance.</p>';
                }
            }else{
                $err = 'Error';
            }
        }else{
            $err = 'Error';
        }
        $v = $price - $update_amt_paid;
        $date = date("Y-m-d");

        if(empty($err)){
            // echo $pid.' '.$ref.' '.$current_pay.' '.$update_amt_paid.' '.$order;  
            if($price == $update_amt_paid) {         
            $d=$conn->query("UPDATE sub SET amt_paid='$update_amt_paid', balance='$v', transaction_status='completed', pro_status='pending'  WHERE referral_id='$ref' AND sub_id='$order' ");
            $d.=$conn->query("INSERT INTO history SET amt_paid='$current_pay', ref_id='$ref', order_id='$order'");
            if($d){
                $err = '<p class="text-success"> Payment recorded successfully </p>';
                $rt = $conn->query("SELECT referral_id FROM sub WHERE sub_id='$order'");
						if($rt->num_rows>0){
							$v = $rt->fetch_assoc();
							if($v['transaction_status']=='completed'){
						$rt = $conn->query("SELECT referrer FROM login WHERE referral_id='".$v['referral_id']."'");
						  if($rt->num_rows>0){
							  $yt = $rt->fetch_assoc();
							  $referral = $yt['referrer'];
							  $user = $conn->query("SELECT wallet FROM login WHERE referral_id='$referral'");
							  if($user->num_rows>0){
								  $yts = $user->fetch_assoc();
								  $bonus = (((Float)$update_amt_paid) * ((Float)0.015)) + ((Float)$yts['wallet']);
								  $users = $conn->query("UPDATE login SET wallet='$bonus' WHERE referral_id='$referral'");
							  }
						  }
						}
					}
            }
            }elseif($update_amt_paid < $price ){
                $d=$conn->query("UPDATE sub SET amt_paid='$update_amt_paid', balance='$v', transaction_status='part' WHERE referral_id='$ref' AND sub_id='$order' ");
                $d .=$conn->query("INSERT INTO history SET amt_paid='$current_pay', ref_id='$ref', order_id='$order' "); 
                if($d){
                    $err = '<p class="text-success">Payment recorded successfully </p>';
                }
            }

        }
}


?>
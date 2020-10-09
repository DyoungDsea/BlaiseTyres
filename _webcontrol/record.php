<?php
require_once '../conn.php';
date_default_timezone_set("Africa/Lagos");
$staff_date = date("Y-m-d h:i:s");
$staff_id = $conn->real_escape_string($_SESSION['admin']);

$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
        
        $subid = $conn->real_escape_string($_POST['subid']);
        $name = $conn->real_escape_string($_POST['pname']);
        $orderid = $conn->real_escape_string($_POST['pid']);
        $user = $conn->real_escape_string($_POST['userid']);
        $total = (Float)$conn->real_escape_string($_POST['amount']);
        $order = date("ymdhis");
           
        $sql = $conn->query("SELECT * FROM dsub WHERE subid='$subid'")->fetch_assoc();
        $dbalance = (Float)$sql['dbalance'];
        $dtotal = (Float)$sql['dtotal'];
        $amt_paid = (Float)$sql['amt_paid'];
        //check if payment is greater than balance
        // echo $total.' '.$dbalance;
        // die();
        if($total > $dbalance){
            $_SESSION['msg']="Amount is greater than Balance, try again";
            header("Location:sub-pending");
        }else{
            //update subid with amount paid
            $bal = (Float)$sql['amt_paid'] + (Float)$total;
            $dbalance = (Float)$sql['dbalance'] - (Float)$total;
            $dtotal = (Float)$sql['dtotal'];
            $d = $conn->query("SELECT * FROM login WHERE userid='$user'")->fetch_assoc();
            
            if($d['referrer'] != NULL){
                $referrer = $d['referrer'];
                $dd = $conn->query("SELECT demail, dwallet FROM login WHERE userid='$referrer'")->fetch_assoc();
                $emails = $dd['demail'];
                $names = $dd['dname'];
                $wall = (Float)$dd['dwallet'];
                $percent = $reep['reef']/100;
                $res = $percent * $dtotal;
                $final = $wall + $res;
                //update wallet
                $conn->query("UPDATE login SET dwallet='$final' WHERE userid='$referrer'");
                $subject="Referrer Bonus";
                $message="Hello ".$names.", your wallet has been credited with $res\r\n";
                $header= "From: ".$web." <".$dcomm_email.">";
                mail($emails,$subject,$message,$header);

            }
            $record ="Amount of &#8358; ".number_format($total,2)." recorded";
            if($bal >= $dtotal ){
                $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$subid', dstatus='$record', ddate='$staff_date' ");
            //Update amount paid
            $up = $conn->query("UPDATE dsub SET amt_paid='$bal', dtrans_status='completed', dbalance='$dbalance' WHERE subid='$subid' AND subid='$subid'");
            $conn->query("INSERT INTO history SET amt_paid='$total', pname='$name', userid='$user', orderid='$order', dpid='$orderid' ") or die($conn->error());
            }else{
                $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$subid', dstatus='$record', ddate='$staff_date' ");
            //Update amount paid
            $up = $conn->query("UPDATE dsub SET amt_paid='$bal', dtrans_status='part', dbalance='$dbalance' WHERE subid='$subid' AND subid='$subid'"); 
            $conn->query("INSERT INTO history SET amt_paid='$total', pname='$name', userid='$user', orderid='$order', dpid='$orderid' ") or die($conn->error());
            }
            $_SESSION['msgs']="Record added successful";

            header("Location:sub-pending");

        }
    }


?>
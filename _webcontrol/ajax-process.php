<?php
require '../conn.php';
// $wack=$conn->query("select * from contact");
//         while($row=$wack->fetch_assoc()){
//             $web_name=$row['name'];
//             $web_email=$row['email'];
//         }

date_default_timezone_set("Africa/Lagos");
$staff_date = date("Y-m-d h:i:s");
$staff_id = $conn->real_escape_string($_SESSION['admin']);
        
$reep = $conn->query("SELECT * FROM dpercent ")->fetch_assoc();
    

    if(isset($_POST['markProcess'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET dstatus='processed' WHERE orderid='$order' AND userid='$user' ");
        if($up){

            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as processed', ddate='$staff_date' ");
            $subject="Processing Order ";
            $message="Hello ".$name.", your order has been processed, you can track your order now. Order ID: ".$order.".\r\n thank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['markPaid'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $total = (Float)$conn->real_escape_string($_POST['total']);
        $d = $conn->query("SELECT demail, dname, referrer FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET payment_status='paid' WHERE orderid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as paid', ddate='$staff_date' ");
            //update referrer wallet with the percentage set
            if($d['referrer'] != NULL){
                $referrer = $d['referrer'];
                $dd = $conn->query("SELECT demail, dwallet FROM login WHERE userid='$referrer'")->fetch_assoc();
                $emaild = $dd['demail'];
                $named = $dd['dname'];
                $wall = (Float)$dd['dwallet'];
                $percent = $reep['reef']/100;
                $res = $percent * $dtotal;
                $final = $wall + $res;
                //update wallet
                $conn->query("UPDATE login SET dwallet='$final' WHERE userid='$referrer'");
                $subject="Referrer Bonus";
                $message="Hello ".$named.", your wallet has been credited with $res\r\n";
                $header= "From: ".$web." <".$dcomm_email.">";
                mail($emaild,$subject,$message,$header);

            }
            
            $subject="Paid Order";
            $message="Hello ".$name.", your order payment has been confirm by Admin. you can track your order now Order ID: ".$order.".\r\n thank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['cancel'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET dstatus='cancelled' WHERE orderid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as cancelled', ddate='$staff_date' ");
            $subject="Cancelled Order";
            $message="Hello ".$name.", your order has been Cancelled, sorry for the inconvinence this may cause you.";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }
    }
//Deliver processed
    if(isset($_POST['markShip'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET dstatus='shipped' WHERE orderid='$order' AND userid='$user' ");
        if($up){           
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as Shipped', ddate='$staff_date' ");
            $subject="Shipped Order";
            $message="Hello ".$name.", your order has been shipped, you can now track your order. Order ID: ".$order.".\r\nthank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['markDelivered'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET dstatus='delivered' WHERE orderid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as delivered', ddate='$staff_date' ");
            $subject="Delivered Order";
            $message="Hello ".$name.", your order has been delivered, you can now track your order. Order ID: ".$order.".\r\nthank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    //Return processed
    if(isset($_POST['markReturned'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dcart_holder SET dstatus='returned' WHERE orderid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as returned', ddate='$staff_date' ");
            $subject="Returned Order";
            $message="Hello ".$name.", your order has been returned, sorry for the inconvinence this may cause you.";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }


    if(isset($_POST['delete'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);        
        $up = $conn->query("DELETE FROM dcart_holder WHERE orderid='$order' AND userid='$user' ");        
        $up = $conn->query("DELETE FROM dcart WHERE orderid='$order' AND userid='$user' ");        

    }

    //Subscription  codes

    if(isset($_POST['pendingSub'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT email, name FROM login WHERE referral_id='$user'")->fetch_assoc();
        $name = $d['name'];
        $email = $d['email'];
        $up = $conn->query("UPDATE orders SET transaction_status='fulfilled' WHERE order_id='$order' AND referral_id='$user' ");
        if($up){
            // echo "Yes";
            $subject=$web_email." Subscription fulfilled";
            $message="Goodday ".$name.", your subscription is been fulfilled\r\n";
            $header= "From: ".$web_name." <".$web_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['application'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dsub SET pstatus='pending' WHERE subid='$order' AND userid='$user' ");
        if($up){
            // echo "Yes";
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as approved(subscription)', ddate='$staff_date' ");
            $subject="Approve Subscription";
            $message="Hello ".$name.", your subscription: ".$order." has been approve, you can start making you payment. use your tracking ID: to check the status,\r\n thank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

     if(isset($_POST['declinez'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dsub SET pstatus='declined' WHERE subid='$order' AND userid='$user' ");
        if($up){
            // echo "Yes";
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as declined(subscription)', ddate='$staff_date' ");
            $subject="Decline Subscription";
            $message="Hello ".$name.", your subscription: ".$order." has been declined, we are sorry for inconvinences this may cause you \r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['allocateSub'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dsub SET pstatus='processed' WHERE subid='$order' AND userid='$user' ");
        if($up){
            // echo "Yes";
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as processed(subscription)', ddate='$staff_date' ");
            $subject="Processed Subscription";
            $message="Hello ".$name.", your subscription: ".$order." has been Processed, use your tracking ID: to check the status,\r\n thank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['allocateSubs'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dsub SET pstatus='shipped' WHERE subid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as shipped(subscription)', ddate='$staff_date' ");
            // echo "Yes";
            $subject="Shipped Subscription";
            $message="Hello ".$name.", your subscription: ".$order." has been shipped, use your tracking ID: to check the status,\r\n thank you for choosing us.\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }

    }

    if(isset($_POST['subcan'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE dsub SET dtrans_status='cancelled', pstatus='cancelled' WHERE subid='$order' AND userid='$user' ");
        if($up){
            $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as cancelled(subscription)', ddate='$staff_date' ");
            // echo "Yes";
            $subject="Subscription cancelled";
            $message="Hello ".$name.", your subscription: ".$order." has been cancelled sorry for inconvinences this may cause you\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }
    
    }
        if(isset($_POST['deliverSub'])){
            $user = $conn->real_escape_string($_POST['uid']);
            $order = $conn->real_escape_string($_POST['id']);
            $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
            $name = $d['dname'];
            $email = $d['demail'];
            $up = $conn->query("UPDATE dsub SET pstatus='delivered' WHERE subid='$order' AND userid='$user' ");
            if($up){
                // echo "Yes";
                $conn->query("INSERT INTO `dtracker` SET dstaff_id='$staff_id', dpid='$order', dstatus='Mark as delivered(subscription)', ddate='$staff_date' ");
                $subject="Order Delivered";
                $message="Hello ".$name.", your order: ".$order." has been delivered successfully check to review\r\n";
                $header= "From: ".$web." <".$dcomm_email.">";
                mail($email,$subject,$message,$header);
            }
        }


    if(isset($_POST['subdelete'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);        
        $up = $conn->query("DELETE FROM sub WHERE sub_id='$order' AND userid='$user' ");
        

    }


    if(isset($_POST['pending'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $up = $conn->query("UPDATE payout SET payment_status='paid' WHERE payment_id='$order' AND userid='$user' ");
        if($up){
            $subject="Payment status";
            $message="Goodday ".$name.", your payment has been approved\r\n";
            $header= "From: ".$web." <".$dcomm_email.">";
            mail($email,$subject,$message,$header);
        }
    }


    if(isset($_POST['pendingdelete'])){
        $user = $conn->real_escape_string($_POST['uid']);
        $order = $conn->real_escape_string($_POST['id']);        
        $amount = $conn->real_escape_string($_POST['amount']);        
        $up = $conn->query("UPDATE payout SET payment_status='cancelled' WHERE payment_id='$order' AND userid='$user' ");
        $xz = $conn->query("SELECT dwallet FROM login WHERE userid='$user'")->fetch_assoc();
        $xx = ((Float)$xz['dwallet'] + ((Float)$amount));
        $up = $conn->query("UPDATE login SET dwallet='$xx' WHERE userid='$user' ");
        $d = $conn->query("SELECT demail, dname FROM login WHERE userid='$user'")->fetch_assoc();
        $name = $d['dname'];
        $email = $d['demail'];
        $subject="Payment request";
        $message="Goodday ".$name.", your payment request has been cancelled, sorry for  inconvinences this may cause you\r\n";
        $header= "From: ".$web." <".$dcomm_email.">";
        mail($email,$subject,$message,$header);
    }



    if(isset($_POST['depositora'])){
        $order = $conn->real_escape_string($_POST['id']);
        $up = $conn->query("UPDATE ddepositor SET dstatus='approved' WHERE depositor_id='$order' ");

    }


    if(isset($_POST['depositorc'])){
        $order = $conn->real_escape_string($_POST['id']);
        $up = $conn->query("UPDATE ddepositor SET dstatus='cancelled' WHERE depositor_id='$order' ");

    }

    if(isset($_POST['depositorcd'])){
        $order = $conn->real_escape_string($_POST['id']);
        $up = $conn->query("DELETE FROM ddepositor WHERE depositor_id='$order' ");

    }


    if(isset($_POST['Not'])){
        $order = $conn->real_escape_string($_POST['id']);
        $text = $conn->real_escape_string($_POST['text']);
        $up = $conn->query("UPDATE `notifivcation` SET dstatus='$text' WHERE notid='$order' ");

    }

    if(isset($_POST['star'])){
        $order = $conn->real_escape_string($_POST['id']);
        $up = $conn->query("UPDATE `drating` SET dstatus='active' WHERE drat_id='$order' ");

    }

    if(isset($_POST['coup'])){
        $order = $conn->real_escape_string($_POST['id']);
        $text = $conn->real_escape_string($_POST['text']);
        $up = $conn->query("UPDATE `dcoupon` SET dstatus='$text' WHERE dcopid='$order' ");

    }
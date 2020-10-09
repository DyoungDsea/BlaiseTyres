
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php"); ?>
 <?php
 $err='';
 $wack=$conn->query("select * from contact");
        while($row=$wack->fetch_assoc()){
            $web_name=$row['name'];
            $web_email=$row['email'];
        }
if(isset($_POST['payment'])){
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
    if(!empty($_POST['pay'])){
            $pay = $conn->real_escape_string($_POST['pay']);
        }else{
            $err = 'Error';
        }

        $d = $conn->query("SELECT email, name FROM login WHERE referral_id='$user'")->fetch_assoc();
        $name = $d['name'];
        $email = $d['email'];


    if(empty($err)){
        $sq = $conn->query("INSERT INTO cart_payment SET order_id='$order', referral_id='$ref', amt_paid='$pay'");
        if($sq){
            $d=$conn->query("INSERT INTO history SET amt_paid='$pay', ref_id='$ref', order_id='$order' ");
            $sq = $conn->query("UPDATE cart SET transaction_status='processed', payment_status='paid' WHERE order_id='$order' AND referral_id='$ref' ");

            $rt = $conn->query("SELECT referrer FROM login WHERE referral_id='$ref'");
						  if($rt->num_rows>0){
							  $yt = $rt->fetch_assoc();
							  $referral = $yt['referrer'];
							  $user = $conn->query("SELECT wallet FROM login WHERE referral_id='$referral'");
							  if($user->num_rows>0){
								  $yts = $user->fetch_assoc();
								  $bonus = (((Float)$pay)* ((Float)0.015)) + ((Float)$yts['wallet']);
								  $users = $conn->query("UPDATE login SET wallet='$bonus' WHERE referral_id='$referral'");
							  }
						  }
            $err = '<p class="text-success">Payment recorded successfully</p>';

            $subject=$web_email." Order processing";
            $message="Goodday ".$name.", your orders is been processed\r\n";
            $header= "From: ".$web_name." <".$web_email.">";
            mail($email,$subject,$message,$header);
        }
    }

  }
}

?>
  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">
<style>
.it{
  height:50px;
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  font-size:17px;
  font-weight:bold;
}
.form-control{
  border-color:0px #d2d6de !important;
}
.sweep,.sweep2{
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  padding-top:10px;
  padding-left:10px;
  width:20%;
  border:1px solid #d2d6de !important;
}
</style>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-9">
      
      </div>
      <!-- <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Product</button>
      </div> -->
              
             </div>
      
      <br>
      <?php
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                        } else {
                            $page_no = 1;
                            } 
                            $total_records_per_page = 10;

                            ?>
 <!-- DataTables Example -->
 <div class="card mb-3" style="margin-top:50px">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Record Payment.</div>
          <div class="card-body">
            <div class="table-responsive">
            <?php
            if(isset($_GET['order_id']) && isset($_GET['referral_id'])){
                $id = $conn->real_escape_string($_GET['order_id']);
                $user = $conn->real_escape_string($_GET['referral_id']);
                $np = $conn->query("SELECT * FROM login WHERE referral_id='$user'")->fetch_assoc();
                $qq = $conn->query("SELECT * FROM cart WHERE order_id ='$id' AND referral_id='$user' ");
                $q = $conn->query("SELECT count('order_id') AS qty,pro_id,pro_name, referral_id, transaction_status, order_id, created_date, SUM(total_price) AS prices, id FROM cart WHERE order_id ='$id' AND referral_id='$user' group by order_id ORDER BY id DESC");

                if($q->num_rows>0){
                    $r = $q->fetch_assoc();
                    
                    $pro_name = $r['pro_name'];
                    $total_price = $r['prices'];
                    $t_status = $r['transaction_status'];
                    ?>

                    <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <p>Customer Name: <strong><?php echo $np['name']; ?></strong></p>
                        <p>Order Name: <strong><?php while($rs = $qq->fetch_assoc()){
                        echo $rs['pro_name'].', ';
                    } ?></strong></p>
                        <p>Total Price: <strong><?php echo number_format($total_price); ?></strong></p>
                        <?php 
                        if($total_price){?>
                        <p>Transaction Status: <strong><?php echo $t_status; ?></strong></p>
                       <?php }
                        ?>
                        </div>
                        <div class="col-md-6">
                        <?php if(isset($err) && $err !==''){
                            echo $err;
                        }else{?>
                        <p class="lead">Record amount here...</p>
                        <?php } ?>
                        <form action="record-payment?order_id=<?php echo $_GET['order_id']; ?>&referral_id=<?php echo $_GET['referral_id']; ?>" method="post" style="width:50%">
                        
                        <div class="form-group">
                        <input type="hidden" name="ref" value="<?php echo $_GET['referral_id']; ?>">
                        <input type="hidden" name="order" value="<?php echo  $_GET['order_id']?>">
                        <input type="text" name="pay" id="" value="<?php echo $total_price; ?>" class="form-control">
                        </div>
                        
                        <button name="payment" class="btn btn-primary btn-block">Submit</button>
                        </form>
                        </div>
                    </div>
                    </div>




                    <?php


                }
            }
            
            ?>
              
        </div>
        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("scripts.php"); ?>
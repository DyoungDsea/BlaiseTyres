
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
if(isset($_POST['payment'])){
  require 'record_payment.php';
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
            if(isset($_GET['sub_id']) && isset($_GET['referral_id'])){
                $id = $conn->real_escape_string($_GET['sub_id']);
                $user = $conn->real_escape_string($_GET['referral_id']);
                $np = $conn->query("SELECT * FROM login WHERE referral_id='$user'")->fetch_assoc();
                $q = $conn->query("SELECT * FROM sub WHERE sub_id ='$id' AND referral_id='$user' ");
                if($q->num_rows>0){
                    $r = $q->fetch_assoc();
                    $pro_name = $r['pro_name'];
                    $total_price = $r['total_price'];
                    $amt_paid = $r['amt_paid'];
                    $bal = $r['balance'];
                    $t_status = $r['transaction_status'];
                    ?>

                    <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                        <p>Customer Name: <strong><?php echo $np['name']; ?></strong></p>
                        <p>Property Name: <strong><?php echo $pro_name; ?></strong></p>
                        <p>Total Price: <strong><?php echo number_format($total_price); ?></strong></p>
                        <p>Amount Paid: <strong><?php if($amt_paid==0){echo '0.00';}else{echo number_format($amt_paid); }?></strong></p>
                        <p>Balance: <strong><?php echo number_format($bal); ?></strong></p>
                        <?php 
                        if($bal==0){?>
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
                        <form action="record-sub-payment?sub_id=<?php echo $_GET['sub_id']; ?>&referral_id=<?php echo $_GET['referral_id']; ?>" method="post" style="width:50%">
                        
                        <div class="form-group">
                        <input type="hidden" name="ref" value="<?php echo $_GET['referral_id']; ?>">
                        <input type="hidden" name="order" value="<?php echo  $_GET['sub_id']?>">
                        <input type="hidden" name="price" value="<?php echo $total_price; ?>">
                        <input type="hidden" name="bal" value="<?php echo $bal; ?>">
                        <input type="hidden" name="amt-paid" value="<?php echo $amt_paid; ?>">
                        <input type="text" name="pay" id="" value="<?php echo $bal; ?>" class="form-control">
                        </div>
                        <?php if($bal !=0){?>
                        <button name="payment" class="btn btn-primary btn-block">Submit</button>
                        <?php } ?>
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
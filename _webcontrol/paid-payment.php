<?php
// require 'staff-only.php';
// require 'clean.php';
// echo md5('e69Tpj')
if(isset($_POST['pro_name'])){    
  $pro_name=$_POST['pro_name'];  
     header("Location: paid-payment?pro_name=$pro_name");  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php");  
      if($r['privilege']=='staff'){
        //check if staff has accessibility
        $sp = $r['dprivilege'];
        $ex = explode(',', $sp);
        if(!in_array('Withdrawals', $ex)){
          header("Location:index");

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
      <form method="post" action="paid-payment" id="tarp">
               <div class="col-md-8" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For Name, Payment ID" name="pro_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
                 </div>
               </div>
               
               <div class="col-md-3 text-right" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
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
                            $total_records_per_page = 100;

                            ?>
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            View Payments Made <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                  <th>Payment ID</th>
                    <th>Name</th>
                    <th>Bank Name</th>
                    <th>Bank Account</th>
                    <th>Account Number</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>End Date</th>
                    <!-- <th colspan="3">---</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
                 if(isset($_GET['pro_name'])){
                  $name = $conn->real_escape_string($_GET['pro_name']);

                  $sqls = $conn->query("SELECT * FROM `payout` WHERE name LIKE '%$name%' AND payment_status ='paid' OR payment_id LIKE '%$name%' AND payment_status ='paid' OR userid LIKE '%$name%' AND payment_status ='paid' ORDER BY id DESC");
                  $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;
                  $sky = $conn->query("SELECT * FROM `payout` WHERE name LIKE '%$name%' AND payment_status ='paid' OR payment_id LIKE '%$name%' AND payment_status ='paid' OR userid LIKE '%$name%' AND payment_status ='paid' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                 }else{
                  $sqls = $conn->query("SELECT * FROM `payout` WHERE payment_status ='paid' ORDER BY id DESC");
                  $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;
                  // $sky = $conn->query("SELECT * FROM sub WHERE type ='subscription' AND amt_paid='' ");
                  $sky =$conn->query("SELECT * FROM `payout` WHERE payment_status ='paid' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                 }
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){                    
                    ?>
                    <tr>
                      <td><?php echo $k['payment_id']; ?></td>
                      <td><?php echo $k['name']; ?></td>
                      <td><?php echo $k['bank_name']; ?></td>
                      <td><?php echo $k['account_name']; ?></td>
                      <td><?php echo $k['account_number']; ?></td>
                      <td>&#8358;<?php echo number_format($k['amount']); ?></td>                      
                      <td><?php  echo $k['payment_status']; ?></td>
                      <td><?php echo date("d M Y", strtotime($k['created_date'])); ?></td>
                      
                    </tr>
               <?php
                  }
                }else{
                    echo '<tr>
                    <td colspan="9" class="text-danger">Sorry! no result found. </td>
                    </tr>';
                }
                ?>
                </tbody>
            </table>
            <ul class="pagination pagination-md justify-content-center">
                    <?php 
                    if(isset($_GET['pro_name'])){
                      for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                          echo "<li  class='page-item '><a class='page-link' href='paid-payment?page_no=$counter&pro_name=".$_GET['pro_name']."' style='color:#0088cc;'>$counter</a></li>"; 
                      
                      }
                    }else{
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                          echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                      
                      }
                    }
                    ?>
                    </ul>
        </div>
        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("scripts.php"); ?>
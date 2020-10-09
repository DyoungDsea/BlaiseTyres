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
 if ($r['privilege'] !='admin') {  
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
      if(!in_array('Orders', $ex)){
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
      <form method="post" action="orders_filter" id="tarp">
               <div class="col-md-7" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="proca_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
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
            Manage Cancelled Orders <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
          <div class="card-body">
            <div class="table-responsive"  style="min-height:200px">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                  <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Total Price(&#8358;)</th>
                    <th>Payment Status</th>
                    <th>Transaction Status</th>
                    <th>Order Date</th>
                    <th colspan="3">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 if(isset($_GET['pro_name'])){
                  $orderId = $conn->real_escape_string($_GET['pro_name']);
                  $sqls = $conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE dcart_holder.orderid LIKE '%$orderId%' OR login.dname LIKE '%$orderId%' AND dcart_holder.dstatus='cancelled' ORDER BY dcart_holder.id DESC");
                 $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;
                  
                  $sky =$conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE dcart_holder.orderid LIKE '%$orderId%' OR login.dname LIKE '%$orderId%' AND dcart_holder.dstatus='cancelled' ORDER BY dcart_holder.id DESC LIMIT $start_from, $total_records_per_page");

                }else{

                
                $sqls = $conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE  dcart_holder.dstatus='cancelled' ORDER BY dcart_holder.id ");

                  $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;

                $sky =$conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE  dcart_holder.dstatus='cancelled' ORDER BY dcart_holder.id LIMIT $start_from, $total_records_per_page");
              }
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $k['orderid']; ?></td>
                      <td><?php echo $k['dname']; ?></td>
                      <td><?php echo number_format($k['dtotal_bill']); ?></td>
                      <td><?php  echo $k['payment_status']; ?></td>                      
                      <td><?php  echo $k['dstatus']; ?></td>
                      <td><?php echo $k['created_date']; ?></td>
                      <td>
                      <input type="hidden" value="<?php echo $k['userid']; ?>" id='referral<?php echo $k['orderid']; ?>'>
                      <div class="btn-group">
                      <div class="btn-group" >
                          <button type="button" style="width:100pxs" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span></button>
                          <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                          <li><a class="nav-link"  href="order-view?orderid=<?php echo $k['orderid']; ?>">View</a></li>
                          <li><a class="nav-link " id="markDel" orderId="<?php echo $k['orderid']; ?>" href="#">Mark as Delivered</a></li>
                          <li><a class="nav-link" id="markPro" orderId="<?php echo $k['orderid']; ?>" href="#">Mark as Processed</a></li>
                          </ul>
                      </div>
                      </div>
                      </td>
                    </tr>
               <?php
                  }
                }else{
                  echo '<tr>
                  <td colspan="7" class="text-danger">Sorry! No result found. </td>
                  </tr>';
                }
                ?>
                </tbody>
            </table>

            </div>

                          
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">
<?php


    if(isset($_GET['pro_name'])){
      for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
        // $pname = $_GET["pro_name"];
        echo "<li  class='page-item '><a class='page-link' href='orders?page_no=$counter&pro_name=".$_GET['pro_name']."' style='color:#0088cc;'>$counter</a></li>"; 

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
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
<?php include("scripts.php"); ?>
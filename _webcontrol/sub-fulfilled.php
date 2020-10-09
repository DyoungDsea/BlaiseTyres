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
    if(!in_array('Subscription', $ex)){
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
      <form method="post" action="sub_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="proc_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
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
            Manage Pending Processing <span class="text-danger"><?php if(isset($_GET['start']) AND @$_GET['start'] !=0){ echo "(".$_GET['start'].")";} ?></span></div>
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
                  <th>Subscription ID</th>
                    <th>Customer Name</th>
                    <th>Property Name</th>
                    <th>Total Price</th>
                    <th>Amount Paid</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th colspan="3">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                
                if(isset($_GET['pro_name'])){
                  $orderId = $conn->real_escape_string($_GET['pro_name']);

                  $sqls = $conn->query("SELECT * FROM login INNER JOIN dsub ON dsub.userid=login.userid WHERE dsub.subid LIKE '%$orderId%' AND dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' OR login.dname LIKE '%$orderId%' AND dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' ORDER BY dsub.id DESC");
                  $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;

                $sky = $conn->query("SELECT * FROM login INNER JOIN dsub ON dsub.userid=login.userid WHERE dsub.subid LIKE '%$orderId%' AND dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' OR login.dname LIKE '%$orderId%' AND dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' ORDER BY dsub.id DESC LIMIT $start_from, $total_records_per_page");

                }else{
                $sqls = $conn->query("SELECT * FROM login INNER JOIN dsub ON dsub.userid=login.userid WHERE dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' ORDER BY dsub.id DESC");
                $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;
                // $sky = $conn->query("SELECT * FROM sub WHERE type ='subscription' AND amt_paid='' ");
                $sky =$conn->query("SELECT * FROM login INNER JOIN dsub ON dsub.userid=login.userid WHERE dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' ORDER BY dsub.id DESC LIMIT $start_from, $total_records_per_page");
                }
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $k['subid']; ?></td>
                      <td><?php echo $k['dname']; ?></td>
                      <td><?php echo $k['pname']; ?></td>
                      <td><?php echo number_format($k['dtotal']); ?></td>
                      <td><?php if($k['amt_paid']=='0'){echo '0.00';}else{ echo number_format($k['amt_paid']); } ?></td>
                      <td><?php echo $k['pstatus']; ?></td>
                      <td><?php  echo date("d M Y", strtotime($k['created_date'])); ?></td>
                      <td><?php echo date("d M Y", strtotime($k['updated_date'])); ?></td>
                      <td>
                      <input type="hidden" value="<?php echo $k['userid']; ?>" id='referral<?php echo $k['subid']; ?>'>
                      <div class="btn-group">
                      <div class="btn-group" >
                          <button type="button" style="width:100px" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span></button>
                          <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                          <li><a class="nav-link" data-toggle="modal" data-target="#exampleModal<?php echo $k['subid']; ?>" href="#">View</a></li>
                          <li><a class="nav-link " id="allocateSubs" orderId="<?php echo $k['subid']; ?>" href="#">Mark as Shipped</a></li>
                          <li><a class="nav-link" id="subcanFill" orderId="<?php echo $k['subid']; ?>" href="#">Cancel</a></li>
                          </ul>
                      </div>
                      </div>
                      </td>
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
            </div>

                            
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">


<?php


if(isset($_GET['pro_name'])){
  for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
    // $pname = $_GET["pro_name"];
    echo "<li  class='page-item '><a class='page-link' href='sub-fulfilled?page_no=$counter&pro_name=".$_GET['pro_name']."' style='color:#0088cc;'>$counter</a></li>"; 

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
<?php
                $sky =$conn->query("SELECT * FROM login INNER JOIN dsub ON dsub.userid=login.userid WHERE dsub.dtrans_status ='completed' AND dsub.pstatus ='processed' ORDER BY dsub.id DESC LIMIT $start_from, $total_records_per_page");
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){?>

<div class="modal fade" id="exampleModal<?php echo $k['subid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
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
                          <th >Product Name</th>
                          <th>Monthly Payment</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                            <tr>
                            <td><img style="height:50px;width:50px;" src="../_product_images/<?php echo $k['dimg']; ?>" alt="product"></td>
                            <td ><?php echo $k['pname']; ?></td>
                           <td>&#8358;<?php echo number_format($k['per_month']); ?></td>
                            </tr>
                        
                          <tr>
                          <td colspan=>Quantity: <?php echo $k['dqty']; ?></td>                          
                          <td colspan=>Product Price: &#8358;<?php echo number_format($k['dprice']); ?></td>                          
                          <td colspan=>Charges: &#8358;<?php echo number_format($k['dcharge']); ?></td>
                          </tr>

                          <tr>
                          <td colspan=>Grand Total: &#8358;<?php echo number_format(((Float)$k['dcharge']) + ((Float)$k['dprice']*(Float)$k['dqty'])); ?></td>
                          <td colspan="">Status: <?php echo ucfirst($k['pstatus']) ?></td>
                          <td colspan="">Transaction Status: <?php echo ucfirst($k['dtrans_status']) ?></td>
                          </tr>
                      </tbody>
                      </table>
                      <div class="user">
                      <p><strong>Name: </strong><?php echo $k['dname']; ?> &nbsp;&nbsp;&nbsp;<strong>Phone: </strong><?php echo $k['dphone']; ?></p>
                      <?php if(!empty($k['dlocation'])){?>
                        <p><strong>Pick up location: </strong><?php echo $k['dlocation']; ?></p>
                      <?php }?>
                      <p><strong>Address: </strong><?php echo $k['daddress']; ?></p>

                      <?php 
                      $sub = $conn->real_escape_string($k['subid']);
                      $sql = $conn->query("SELECT * FROM _security INNER JOIN dtracker ON _security.userid=dtracker.dstaff_id WHERE dtracker.dpid='$sub'");
                      if($sql->num_rows>0){?>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <style>
                        tr,th,td{
                            font-size:12px;
                            font-weight:bold;
                        }
                        </style>
                      <thead>
                        <tr>
                          <th>Staff ID</th>
                          <th>Staff Name</th>
                          <th >Details</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>

                      
                       <?php while($top=$sql->fetch_assoc()){?>
                        <tr>
                        <td><?php echo $top['dstaff_id']; ?> </td>
                        <td><?php echo $top['uname']; ?></td>
                        <td><?php echo $top['dstatus']; ?></td>
                        <td><?php echo date("M d, Y",strtotime($top['ddate'])); ?></td>
                        
                        </tr>

                      <?php  } ?>


                      </tbody>
                      </table>
                      <?php  } ?>
                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>


              <?php
                  }
                }
                ?>
<?php include("scripts.php"); ?>
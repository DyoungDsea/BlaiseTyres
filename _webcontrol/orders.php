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
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For Order Id" name="pro_name" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
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
            Manage Pending  Orders <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
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
                  $sqls = $conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE dcart_holder.orderid LIKE '%$orderId%' OR login.dname LIKE '%$orderId%' AND dcart_holder.dstatus='pending' AND dcart_holder.dpay_mth ='yespay'  ORDER BY dcart_holder.id DESC");
                 $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;
                  
                  $sky =$conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE dcart_holder.orderid LIKE '%$orderId%' OR login.dname LIKE '%$orderId%' AND dcart_holder.dstatus='pending' AND dcart_holder.dpay_mth ='yespay'  ORDER BY dcart_holder.id DESC LIMIT $start_from, $total_records_per_page");

                }else{

                
                $sqls = $conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE  dcart_holder.dstatus='pending' AND dcart_holder.dpay_mth ='yespay'  ORDER BY dcart_holder.id ");

                  $total_records =$sqls->num_rows;
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $start_from = ($page_no - 1) * $total_records_per_page;

                $sky =$conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE  dcart_holder.dstatus='pending' AND dcart_holder.dpay_mth ='yespay'  ORDER BY dcart_holder.id LIMIT $start_from, $total_records_per_page");
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
                      <input type="hidden" value="<?php echo $k['dtotal_bill']; ?>" id='total<?php echo $k['orderid']; ?>'>
                      <div class="btn-group">
                      <div class="btn-group" >
                          <button type="button" style="width:100pxs" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span></button>
                          <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                          <li><a class="nav-link"  href="order-view?orderid=<?php echo $k['orderid']; ?>">View</a></li>
                          <?php if($k['payment_status']=="pending"): ?>
                          <li><a class="nav-link " id="markPaid" orderId="<?php echo $k['orderid']; ?>" href="#">Mark as Paid</a></li>  <?php endif; if($k['payment_status']=="paid"):  ?>                       
                          <li><a class="nav-link " id="markProcess" orderId="<?php echo $k['orderid']; ?>" href="#">Mark as Processed</a></li> <?php endif; ?>
                          <li><a class="nav-link" id="corders" orderId="<?php echo $k['orderid']; ?>" href="#">Cancel</a></li>
                          </ul>
                      </div>
                      </div>
                      </td>
                    </tr>
               <?php
                  }
                }else{
                  echo '<tr>
                  <td colspan="7" class="text-danger">Sorry! no result found </td>
                  </tr>';
                }
                ?>
                </tbody>
            </table>
</div>
             <!-- Updated Last at :  -->
                             
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
<?php
                
                // $sky = $conn->query("SELECT * FROM orders WHERE type ='regular' AND amt_paid='' ");
                $sky =$conn->query("SELECT * FROM dcart_holder WHERE  dstatus='pending'  ORDER BY id LIMIT $start_from, $total_records_per_page");
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){?>
                <div class="modal fade" id="exampleModal<?php echo $k['orderid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
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
                          <th>Product Name</th>
                          <th>Product Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $order = $k['order_id'];
                        $g = $conn->query("SELECT *
                        FROM cart
                        INNER JOIN  products
                        ON cart.pro_id=products.pro_id WHERE order_id='$order'");
                        if($g->num_rows>0){
                          $total=0;
                          while($gr = $g->fetch_assoc()){
                                $imgh = explode(',' ,$gr['pro_img']);
                                $total = $total + $gr['reg_price'];

                            ?>
                            <tr>
                            <td><img style="height:50px;width:50px;" src="../product_images/<?php echo $imgh[0]; ?>" alt="product"></td>
                            <td><?php echo $gr['pro_name']; ?></td>
                            <td><?php echo number_format($gr['reg_price']); ?></td>
                            </tr>
                        <?php  }
                        }
                        ?>
                          <tr>
                          <td colspan=2>Total</td>
                          <td ><?php echo number_format($total); ?></td>
                          </tr>
                          <tr>
                          <td colspan=2>Processing Fee</td>
                          <?php  ?>
                          <td ><?php echo number_format($feed); ?></td>
                          </tr>
                      </tbody>
                      </table>
                      <div class="user">
                      <?php 
                      $ref = $k['referral_id'];
                      $user = $conn->query("SELECT * FROM login WHERE referral_id='$ref'");
                      if($user->num_rows>0){
                        $u = $user->fetch_assoc();
                      }?>
                      <p><strong>Name: </strong><?php echo $u['name']; ?></p>
                      <p><strong>Phone: </strong><?php echo $u['phone']; ?></p>
                      <p><strong>Address: </strong><?php echo $u['address']; ?></p>

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


<div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/change-password" method="post">
            <div class="form-group">
            <input type="hidden" name="hid" value="<?php echo $r['user_id']; ?>">
            <label for="">Old Password</label>
                <input type="password" placeholder="Old password" required name="old"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">New Password</label>
                <input type="password" required placeholder="New password" name="new"  id="" class="form-control">
            </div>
            <div class="form-group">
            <label for="">Confirm New password</label>
                <input type="password" required placeholder="Confirm New password" name="cnew"  id="" class="form-control">
            </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="passed" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="phpfiles/edit-profile" method="POST">
                        <div class="form-group required-field">
                            <label for="contact-name">Name</label>
                            <input type="text" class="form-control" value="<?php echo $r['name'];?>" id="contact-name" name="name" required>
                            <input type="hidden" value="<?php echo $r['user_id'];?>" id="contact-name" name="id" required>
                        </div><!-- End .form-group -->

                        <div class="form-group required-field">
                            <label for="contact-email">Email</label>
                            <input type="email" value="<?php echo $r['email'];?>" class="form-control" id="contact-email" name="email" required>
                        </div><!-- End .form-group -->

                        <div class="form-group">
                            <label for="contact-phone">Phone Number</label>
                            <input type="tel" value="<?php echo $r['phone'];?>" class="form-control" id="contact-phone" name="phone">
                        </div><!-- End .form-group -->

                       
                        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" name="edited" type="submit">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
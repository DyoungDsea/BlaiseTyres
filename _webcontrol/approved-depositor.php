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
    $sp = $r['staff_privilege'];
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
                   <input type="text" placeholder="Search For " name="pro_nameap" value="<?php if(isset($_GET['pro_name'])){echo $_GET['pro_name'];} ?>" class="form-control it">
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
      
    $fees=$conn->query("SELECT * FROM charge")->fetch_assoc();
    $feed = ((Float)$fees['fees']);

    //    $page_name="pagination.php"; 
       // $start=$_GET['start'];	
       if(isset($_GET['start'])){
       if(!($_GET['start'] > 0)) { 
       $start = $_GET['start'];
       }else{
           $start = $_GET['start'];
       }
       }else{
           $start=0;
       }
   
       if(isset($_GET['p_f'])){ 
           $p_f =$_GET['p_f'];                       
       }else{
           $p_f=0;
       }
       
       $eu = ($start -0);                
       $limit = 100; 
       $this1 = $eu + $limit; 
       $back = $eu - $limit; 
       $next = $eu + $limit; 

                ?>
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Approved  Depositors <span class="text-danger"><?php if(isset($_GET['start']) AND @$_GET['start'] !=0){ echo "(".$_GET['start'].")";} ?></span></div>
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
                  <th>Depositor ID</th>
                  <th>User ID</th>
                  <th>Order ID/Subscription ID</th>
                    <th>Depositor Name</th>
                    <th>Amount</th>
                    <th> Status</th>                    
                    <th>Order Date</th>
                    <th colspan="3">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['pro_name'])){
                  $orderId = $conn->real_escape_string($_GET['pro_name']);
                  $counter = $conn->query("SELECT * FROM `ddepositor` WHERE depositor_id LIKE '%$orderId%' AND dstatus='approved' OR  userid LIKE '%$orderId%' AND dstatus='approved' OR  pro_id LIKE '%$orderId%' AND dstatus='approved' OR  dname LIKE '%$orderId%' AND dstatus='approved' ORDER BY ddate DESC");
                  $nume=$counter->num_rows;
                  
                  $sky =$conn->query("SELECT * FROM `ddepositor` WHERE depositor_id LIKE '%$orderId%' AND dstatus='approved' OR  userid LIKE '%$orderId%' AND dstatus='approved' OR  pro_id LIKE '%$orderId%' AND dstatus='approved' OR  dname LIKE '%$orderId%' AND dstatus='approved' ORDER BY ddate DESC LIMIT $eu, $limit");

                }else{

                
                $counter = $conn->query("SELECT * FROM `ddepositor` WHERE dstatus='approved' ORDER BY ddate DESC");
                $nume=$counter->num_rows;

                $sky =$conn->query("SELECT * FROM `ddepositor` WHERE dstatus='approved' ORDER BY ddate DESC LIMIT $eu, $limit");
              }
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo $k['depositor_id']; ?></td>
                      <td><?php echo $k['userid']; ?></td>
                      <td><?php echo $k['pro_id']; ?></td>
                      <td><?php echo $k['dname']; ?></td>
                      <td><?php echo number_format($k['damount']); ?></td>
                      <td><?php  echo $k['dstatus']; ?></td>            
                      <td><?php echo $k['ddate']; ?></td>
                      <td>
                      <input type="hidden" value="<?php echo basename($_SERVER["REQUEST_URI"]); ?>" id='referral'>
                      <div class="btn-group">
                      <div class="btn-group" >
                          <button type="button" style="width:100px" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          Action <span class="caret"></span></button>
                          <ul class="dropdown-menu" role="menu" style="font-size:14px; width:100%;text-align:center">
                          <li><a class="nav-link" data-toggle="modal" data-target="#exampleModal<?php echo $k['depositor_id']; ?>" href="#">View</a></li>
                          <li><a class="nav-link" id="depositorc" orderId="<?php echo $k['depositor_id']; ?>" href="#">Cancel</a></li>
                          </ul>
                      </div>
                      </div>
                      </td>
                    </tr>
               <?php
                  }
                }else{
                  echo '<tr>
                  <td colspan="7" class="text-danger">Sorry! there is no pending orders </td>
                  </tr>';
                }
                ?>
                </tbody>
            </table>
</div>
             <!-- Updated Last at :  -->
    <?php
//start pager
if($nume>$limit) { ?>                            
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">
<?php

///// Variables set for advance paging///////////
$p_limit=80; // This should be more than $limit and set to a value for whick links to be breaked
if(isset($_GET['p_f'])){
$p_f=$_GET['p_f'];								// To take care global variable if OFF
if(!($p_f > 0)) {                         // This variable is set to zero for the first page
$p_f = 0;
}
}


$p_fwd=$p_f+$p_limit;
$p_back=$p_f-$p_limit;


if(isset($_GET['pro_name'])){


  if($p_f<>0){print "<li class='page-item'><a class='page-link' href='orders?pro_name=".$_GET['pro_name']."&start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>&laquo; PREV $p_limit</font></a></li>"; }
  //// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
  if($back >=0 and ($back >=$p_f)) { 
  print "<li class='page-item'><a class='page-link' href='orders?pro_name=".$_GET['pro_name']."&start=$back&p_f=$p_f'><font face='Verdana' size='2'>&laquo; PREV</font></a></li>"; 
  } 
  //////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
  for($i=$p_f;$i < $nume and $i<($p_f+$p_limit); $i=$i+$limit){
  if($i <> $eu){
  $i2=$i+$p_f;
  $im=$i+1;
  echo " <li class='page-item'><a class='page-link' href='orders?pro_name=".$_GET['pro_name']."&start=$i&p_f=$p_f'><font face='Verdana' size='2'>$im</font></a> </li>";
  }
  else { 
  $im=$i+1;
  echo "<li class='page-item active'><a class='page-link' href='#'><font face='Verdana' size='2' >$im</font></a></li>";
  }        /// Current page is not displayed as link and given font color red
  
  }
  
  
  ///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
  if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
  print "<li class='page-item'><a class='page-link' href='orders?pro_name=".$_GET['pro_name']."&start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT &raquo;</font></a></li>";} 
  if($p_fwd < $nume){
  print "<li class='page-item'><a class='page-link' href='orders?pro_name=".$_GET['pro_name']."&start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit &raquo;</font></a></li>"; 
  }
  
}else{
  if($p_f<>0){print "<li class='page-item'><a class='page-link' href='?start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>&laquo; PREV $p_limit</font></a></li>"; }
  //// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
  if($back >=0 and ($back >=$p_f)) { 
  print "<li class='page-item'><a class='page-link' href='?start=$back&p_f=$p_f'><font face='Verdana' size='2'>&laquo; PREV</font></a></li>"; 
  } 
  //////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
  for($i=$p_f;$i < $nume and $i<($p_f+$p_limit); $i=$i+$limit){
  if($i <> $eu){
  $i2=$i+$p_f;
  $im=$i+1;
  echo " <li class='page-item'><a class='page-link' href='?start=$i&p_f=$p_f'><font face='Verdana' size='2'>$im</font></a> </li>";
  }
  else { 
  $im=$i+1;
  echo "<li class='page-item active'><a class='page-link' href='#'><font face='Verdana' size='2' >$im</font></a></li>";
  }        /// Current page is not displayed as link and given font color red
  
  }
  
  
  ///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
  if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
  print "<li class='page-item'><a class='page-link' href='?start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT &raquo;</font></a></li>";} 
  if($p_fwd < $nume){
  print "<li class='page-item'><a class='page-link' href='?start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit &raquo;</font></a></li>"; 
  }

}
?>
				</ul>
                            </div>
<?php }
//end pager
 ?>	

    

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
                $sky =$conn->query("SELECT * FROM `ddepositor` WHERE dstatus='approved' ORDER BY ddate DESC");
                if($sky->num_rows>0){
                  while($k=$sky->fetch_assoc()){?>
                <div class="modal fade" id="exampleModal<?php echo $k['depositor_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Teller</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      
                      <p>
                      
                      <img style="" src="../product_images/<?php echo $k['dimg']; ?>" alt="product">
                            
                      </p>
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
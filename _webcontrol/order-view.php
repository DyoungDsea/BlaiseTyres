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
//  if ($r['privilege'] !='admin') {  
//     $sp = $r['staff_privilege'];
//     $ex = explode(',', $sp);
//       if(!in_array('Orders', $ex)){
//         header("Location:index");
//       } 

//   }
  
  
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
     
      
      <br>
      
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
             Orders Details </div>
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
                  <th style="width:200px">---</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['orderid'])){
                    $orderid = $_GET['orderid'];
                $sky =$conn->query("SELECT * FROM dcart_holder INNER JOIN login ON dcart_holder.userid=login.userid WHERE  orderid='$orderid'");
              }
                if($sky->num_rows>0){
                  $k=$sky->fetch_assoc(); ?>
                    

                    <tr>
                        <td>Order ID</td>
                        <td><?php echo $k['orderid']; ?></td>
                    </tr>

                    <tr>
                        <td>Order Date</td>
                        <td><?php echo date("d M Y", strtotime($k['created_date'])); ?></td>
                    </tr>

                    <tr>
                        <td>Fullname</td>
                        <td><?php echo $k['dname']; ?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><?php echo $k['demail']; ?></td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td><?php echo $k['dphone']; ?></td>
                    </tr>

                    
                    <?php $num = 1;
                        $love = $conn->query("SELECT pname FROM dcart WHERE orderid='$orderid'");
                        while($lover=$love->fetch_assoc()){?>
                            <tr>
                                <td>Product Name <?php echo $num++; ?></td>
                                <td><?php  echo  $lover['pname'] ?></td>
                            </tr>
                       <?php }
                        
                        ?>

                    <tr>
                        <td>Total Bill</td>
                        <td>&#8358;<?php echo number_format($k['dtotal_bill']); ?></td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td><?php  echo $k['payment_status']; ?></td> 
                    </tr>

                    <tr> 
                        <td>Transaction Status</td>
                        <td><?php  echo $k['dstatus']; ?></td>
                    </tr>
                    <?php if($k['dpay_mth']=='ondelivery'):?>
                    <tr> 
                        <td>Method of payment</td>
                        <td><?php  echo $k['dpay_mth']; ?></td>
                    </tr>
                    <?php endif; ?>
                    
                    <?php if($k['daddess'] !=''){?>
                      <tr> 
                          <td>Delivery Area</td>
                          <td><?php  echo $k['dlocation']; ?></td>
                      </tr>
                      <tr> 
                          <td>Delivery Address</td>
                          <td><?php  echo $k['daddess']; ?></td>
                      </tr>
                   <?php }else{?>
                    <tr> 
                        <td>Delivery Station</td>
                        <td><?php  echo $k['dlocation']; ?></td>
                    </tr>
                   <?php } ?>

                    <tr>
                        <td>Address</td>
                        <td><?php echo $k['daddress']; ?></td>
                    </tr>

               <?php
                  
                }else{
                  echo '<tr>
                  <td colspan="7" class="text-danger">Sorry! there is no pending orders </td>
                  </tr>';
                }
                ?>
                </tbody>
            </table>

            <?php 
                      $sub = $conn->real_escape_string($_GET['orderid']);
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
                        <td><?php echo date("M d, Y h:ia",strtotime($top['ddate'])); ?></td>
                        
                        </tr>

                      <?php  } ?>


                      </tbody>
                      </table>
                      <?php  } ?>
</div>
             <!-- Updated Last at :  -->


    

        </div>
        </div>
        </div>

        <?php include("footer.php"); ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
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
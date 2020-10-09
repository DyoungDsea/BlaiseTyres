<?php
// require 'staff-only.php';
// $b = $_SESSION['admin'];
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
 if ($r['privilege'] !='admin') {  
    $sp = $r['privilege'];
    $ex = explode(',', $sp);
      if(!in_array('new-staff', $ex)){
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
      <?php //echo @$_SESSION['love']; ?>
      <div class="row">
      <div class="col-md-9">
      
      </div>
      <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#addstaff">Create New Staff</button>
      </div>
       </div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Manage Staff</div>
          <div class="card-body">
            <div class="table-responsive" style="min-height:250px">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:12px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>---</th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['name']) ){
  $sname=$_GET['name'];
  // $sstart=$_GET['start'];
  // $send=$_GET['end'];
  $count_all=$conn->query("select count(*) from `_security` where name LIKE '%$sname%' and privilege='staff' ");
 }else{
  $count_all=$conn->query("select count(*) from `_security` where privilege='staff'");
 }
    while($row=$count_all->fetch_array()){
        $count_val=$row[0];
    }
    $pages=ceil($count_val/$per_page);

if(isset($_GET['name'])){
  $sname=$_GET['name'];
  // $sstart=$_GET['start'];
  // $send=$_GET['end'];
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from `_security` where name LIKE '%$sname%'  or user_id like '%$sname%' and privilege='staff'  order by id DESC LIMIT $per_page OFFSET $start");
  }
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from `_security` where privilege='staff' order by id desc LIMIT $per_page OFFSET $start");
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    
    <tr>
    <td><?php echo $row['uname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['dphone']; ?></td>
    <td class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>Action</span>
        </a> 
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
          <a class="dropdown-item" href="account-view?user_id=<?php echo $row['userid']; ?>"><i class="fa fa-eye"></i> View</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item delz" data-toggle="modal" style="cursor:pointer;" data-target="#editstaff<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item delz" data-toggle="modal" style="cursor:pointer;"  data-target="#delete<?php echo $row['id'];?>"><i class="fa fa-trash"></i> Delete</a>
        </div>
      </td>
    </tr> 
<?php }
}else{
  echo "<tr><td colspan=8>No results Found</td></tr>";
}
?>                               
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="card-footer small text-muted">
          <!-- Updated Last at :  -->

<ul class="pagination pagination-md justify-content-center">
<?php
if(isset($_GET['name'])){
  for($icount=1;$icount<=$pages;$icount++) { ?>
    <li class="page-item">
    <a class="page-link" style="color:#0088cc;" href="new-staff?page=<?php echo $icount; ?>&name=<?php echo $_GET['name']; ?>"><?php echo $icount; ?></a>
    </li>
    <?php }  
}else{
      for($icount=1;$icount<=$pages;$icount++) { ?>
      <li class="page-item">
      <a class="page-link" style="color:#0088cc;" href="new-staff?page=<?php echo $icount; ?>"><?php echo $icount; ?></a>
      </li>
      <?php } 
}
?>
</ul>


          </div>
        </div>
      </div>
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <style>
  .form-group{
    margin-bottom:5px;
  }
  </style>



  <div class="modal fade" id="addstaff" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="phpfiles/manage-staff" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create New Staff</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">

                    <div class="form-group required-field">
                    <label>Fullname</label>
                    <input type="text" name="name" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group required-field">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control form-control-sm" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group required-field" style="margin-bottom:0;">
                    <label>Phone Number</label>
                    <input type="phone" name="phone" class="form-control form-control-sm" required>
                    </div>
                    </div>
                    </div>
                    </div>

                <p>Assign Privileges to Manage</p>
                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Customers" type="checkbox" id="inlineCheckbox1" name="product">
                <label class="form-check-label" for="inlineCheckbox1">Manage Customers</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Brand" type="checkbox" id="inlineCheckbox2" name="branch">
                <label class="form-check-label" for="inlineCheckbox2">Manage Brands</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Orders" type="checkbox" id="inlineCheckbox3" name="user" >
                <label class="form-check-label" for="inlineCheckbox3">Manage Orders</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Subscription" type="checkbox" id="inlineCheckbox24" name="sub">
                <label class="form-check-label" for="inlineCheckbox24">Manage Subscriptions</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Category" type="checkbox" id="inlineCheckbox311" name="cat" >
                <label class="form-check-label" for="inlineCheckbox311">Manage Categories</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Sub Category" type="checkbox" id="inlineCheckbox30" name="subcat" >
                <label class="form-check-label" for="inlineCheckbox30">Manage Sub Categories</label>
                </div>


                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Products" type="checkbox" id="inlineCheckbox31" name="product" >
                <label class="form-check-label" for="inlineCheckbox31">Manage Products</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Blog" type="checkbox" id="inlineCheckbox32" name="blog" >
                <label class="form-check-label" for="inlineCheckbox32">Manage Blog</label>
                </div>
              
                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Withdrawals" type="checkbox" id="inlineCheckbox33" name="with" >
                <label class="form-check-label" for="inlineCheckbox33">Manage Withdrawals</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Star Rating" type="checkbox" id="inlineCheckbox34" name="star" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Star Rating</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Slide" type="checkbox" id="inlineCheckbox34" name="slide" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Slide</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Delivery" type="checkbox" id="inlineCheckbox34" name="delivery" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Delivery Charges</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Coupon" type="checkbox" id="inlineCheckbox34" name="coupon" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Coupon</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Site Setting" type="checkbox" id="inlineCheckbox34" name="site" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Site Setting</label>
                </div>
                
                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Notification" type="checkbox" id="inlineCheckbox34" name="note" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Notification</label>
                </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



                   
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<?php include("scripts.php"); ?>
<script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});
</script>


<?php
 $p=$conn->query("SELECT * FROM `_security` WHERE privilege='staff' ");
while($l=$p->fetch_assoc()){ ?>
<div class="modal fade" id="editstaff<?php echo $l['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="phpfiles/manage-staff-update" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Account</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?php echo $l['userid']; ?>" class="form-control form-control-sm" required>

                    <div class="form-group required-field">
                    <label>Fullname</label>
                    <input type="text" name="name" value="<?php echo $l['uname']; ?>" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                    <div class="form-row">
                    <div class="col-md-6">
                    <div class="form-group required-field">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?php echo $l['email']; ?>" class="form-control form-control-sm" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group required-field" style="margin-bottom:0;">
                    <label>Phone Number</label>
                    <input type="phone" name="phone" value="<?php echo $l['dphone']; ?>" class="form-control form-control-sm" required>
                    </div>
                    </div>
                    </div>
                    </div>

                    <?php 

                    $pri = $l['dprivilege'];
                    $explode = explode(',', $pri);
                    ?>
                    <p>Assign Privileges to Manage </p>
                

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Customers" <?php if(in_array('Customers', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox1" name="product">
                <label class="form-check-label" for="inlineCheckbox1">Manage Customers</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Brand" <?php if(in_array('Brand', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox2" name="branch">
                <label class="form-check-label" for="inlineCheckbox2">Manage Brands</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Subscription" <?php if(in_array('Subscription', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox2" name="sub">
                <label class="form-check-label" for="inlineCheckbox2">Manage Subscription</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Product" <?php if(in_array('Product', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox2" name="product">
                <label class="form-check-label" for="inlineCheckbox2">Manage Product</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Orders" <?php if(in_array('Orders', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox3" name="user" >
                <label class="form-check-label" for="inlineCheckbox3">Manage Orders</label>
                </div>

                

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Category" <?php if(in_array('Category', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox3" name="cat" >
                <label class="form-check-label" for="inlineCheckbox3">Manage Categories</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Sub Category"  <?php if(in_array('Sub Category', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox30" name="subcat" >
                <label class="form-check-label" for="inlineCheckbox30">Manage Sub Categories</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Blog" <?php if(in_array('Blog', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox3" name="blog" >
                <label class="form-check-label" for="inlineCheckbox3">Manage Blog</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Withdrawals" <?php if(in_array('Withdrawals', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox3" name="with" >
                <label class="form-check-label" for="inlineCheckbox3">Manage  Withdrawals</label>
                </div>
              
                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Star Rating" <?php if(in_array('Star Rating', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox3" name="star" >
                <label class="form-check-label" for="inlineCheckbox3">Manage Star Rating</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Slide" <?php if(in_array('Slide', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox34" name="slide" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Slide</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Delivery" <?php if(in_array('Delivery', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox34" name="delivery" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Delivery Charges</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Coupon" <?php if(in_array('Coupon', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox34" name="coupon" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Coupon</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Site Setting" <?php if(in_array('Site Setting', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox34" name="site" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Site Setting</label>
                </div>
                
                <div class="form-check form-check-inline">
                <input class="form-check-input" value="Notification" <?php if(in_array('Notification', $explode)){ echo 'checked';} ?> type="checkbox" id="inlineCheckbox34" name="note" >
                <label class="form-check-label" for="inlineCheckbox34">Manage Notification</label>
                </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



    <div class="modal fade" id="delete<?php echo $l['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        
        <form action="phpfiles/manage-user-delete" method="post">
        <input type="hidden" name="id" value="<?php echo $l['userid']; ?>" >
          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete </h5>
          <p>
        Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" name='staff' class="btn btn-primary delzv" href="">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>


                                <?php } ?>
</body>
</html>



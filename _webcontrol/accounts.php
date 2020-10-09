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
      if(!in_array('Customers', $ex)){
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
      <form method="post" action="account_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
              
               <div class="col-md-3 text-right" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <!-- <div class="col-md-3 "><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Create New Account</button> -->
      </div>
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
            <i class="fas fa-user"></i>
            Manage Customers <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
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
                    <th>User ID</th>
                  <th>Account Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
<?php

  
if(isset($_GET['name'])){
  $sname=$_GET['name'];
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    // $start=(($_GET['page'])-1)*$per_page;
    $sqls=$conn->query("select * from login where dname LIKE '%$sname%'  OR dstatuss LIKE '%$sname%'  OR dphone LIKE '%$sname%'order by id DESC");

    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    
    $site=$conn->query("select * from login where dname LIKE '%$sname%'  OR dstatuss LIKE '%$sname%'  OR dphone LIKE '%$sname%'order by id DESC LIMIT  $start_from, $total_records_per_page");
  }
}else{

  $sqls=$conn->query("select * from login order by id desc ");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    
    $site=$conn->query("select * from login order by id desc LIMIT  $start_from, $total_records_per_page");
  
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
    <td><?php echo $row['userid']; ?></td>
    <td><?php echo $row['dname']; ?></td>
    <td><?php echo $row['demail']; ?></td>
    <td><?php echo $row['dphone']; ?></td>
    <td><?php echo $row['dstatuss']; ?></td>
    <td><?php echo read_able($row['created_date']); ?></td>
    <td class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span>More</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Login Screens:</h6> -->
          <a class="dropdown-item" href="account_view?userid=<?php echo $row['userid']; ?>">View</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item delz" data-toggle="modal" style="cursor:pointer;" data-delete_id="account_delete?id=<?php echo $row['id']; ?>" data-target="#delete">Delete</a>
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
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:550px;">
            <div class="modal-content">
                <form action="account_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Create Account</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body">

                    <div class="form-group required-field">
<label>Account Name</label>
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



              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
              <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" name="password1" class="form-control" required="required">
              
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
              <label for="confirmPassword">Confirm password</label>
              <input type="password" name="password2" class="form-control" required="required">
              </div>
              </div>
              </div>
              </div>


<div class="form-group required-field">
<label>Address</label>
<textarea class="form-control" required name="address" cols="30" rows="2"></textarea>
</div>
<div class="form-group">
<div class="form-row">
<div class="col-md-6">
<div class="form-group required-field">
<label>Level</label>
<select name="level" required class="form-control">
<?php
$query1=$conn->query("select * from levels");
if($query1->num_rows>=1){
while($row2=$query1->fetch_assoc()){ ?>
<option <?php if($row2['level']===$row['level']){ echo "selected"; } ?> value="<?php echo $row2['level']; ?>"><?php echo ucwords($row2['level']); ?></option>
<?php }
}else{ ?>
<option>No level available</option>
<?php }
?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group required-field">
<label>Supervisor</label>
<input type="text" name="supervisor_id" class="form-control" required="required">
</div>
</div>
</div>
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
</body>
</html>



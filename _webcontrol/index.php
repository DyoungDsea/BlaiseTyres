<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>

<body id="page-top">

 <?php include("header.php");  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mt-2">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <div class="panel my-3">
        <?php if($r['privilege'] !='staff'){ ?>
        <a href="new-staff" class="btn btn-primary">Create Sub Admin</a>
        <?php } ?>
        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#pass">Change Password</a>
        <a class="btn btn-success" href="edit-profile" data-toggle="modal" data-target="#edit-profile">Edit Profile</a>
        </div>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <?php 
                $sky =$conn->query("SELECT * FROM `dcart_holder` WHERE dstatus ='pending' AND payment_status ='paid' ");
                ?>
                <div class="mr-5">(<?php echo $sky->num_rows; ?>) Pending Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="orders">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <?php 
                $skys =$conn->query("SELECT * FROM `dsub` WHERE dtrans_status ='completed' AND pstatus ='pending' ");
                ?>
                <div class="mr-5">(<?php echo $skys->num_rows; ?>) Pending Subscritpion</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="sub-fulfilled">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php 
                $sky =$conn->query("SELECT * FROM `dcart_holder` WHERE dstatus ='pending' AND dpay_mth ='ondelivery' ");
                ?>
                <div class="mr-5">(<?php echo $sky->num_rows; ?>) Pay on delivery</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="pay-on-delivery">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php include("footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



<?php include("scripts.php"); ?>

</body>

</html>

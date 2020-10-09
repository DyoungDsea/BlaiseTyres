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
      if(!in_array('Financial', $ex)){
        header("Location:index");
      } 

  }
  
  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <!-- <div class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Payment Status</button></div> -->
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Financial Report</div>
          <div class="card-body">
          <div class="my-3">
          <form action="finances-filter" method="POST">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
              <label for="">Start Date</label>
                <input type="date" name="date1" id="" value="<?php echo date('Y-m-01'); ?>" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
              <label for="">End Date </label>
                <input type="date" name="date2" id="" value="<?php echo date('Y-m-d'); ?>" class="form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
              <label for="" style="visibility:hidden">Start Date</label>
              <p>
                <input type="submit" name="Search" id=""  value="SEARCH" class="btn btn-primary"></p>
              </div>
            </div>
          </div>
          </form>
          </div>
            <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <h5>Total Sales</h5>
                <?php 

                if(isset($_GET['start']) && isset($_GET['end'])){
                  $start = $conn->real_escape_string($_GET['start']);
                  $end = $conn->real_escape_string($_GET['end']);
                  $sale=$conn->query("SELECT * FROM history WHERE create_time >='$start' AND create_time <='$end'");
                }else {
                  $sale=$conn->query("SELECT * FROM history");
                }
                
                $total = 0;
                while($x=$sale->fetch_assoc()){
                    $total += ((Float)$x['amt_paid']);
                    
                }
                echo '<p>&#8358;'.number_format($total,2).'</p>';
                ?>
                </div>
            </div>

            </div>
            <div class="col-md-6">
            
            <div class="card">
                <div class="card-body">
                <h5>Total Vat</h5>
                <?php
                echo '<p>&#8358;'.number_format($total * (5/100),2).'</p>';
                ?>
                </div>
            </div></div>
            </div>
          </div>
          <div class="card-footer small text-muted">
          <!-- Updated Last at :  -->
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

  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="payment_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Payment Status</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Payment Status </label>
                                        <input type="text" name="status" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Status</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="payment_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Payment Status</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Payment Status </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="status" id="form-status" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Status</button>
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
document.querySelectorAll(".fillz").forEach(function(g){
g.addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
  document.querySelector("#form-status").value=d.target.dataset.status;
});
});
</script>
<script>
document.querySelectorAll(".delz").forEach(function(d){
d.addEventListener("click",function(g){
  document.querySelector(".delzv").href=g.target.dataset.delete_id;
});
});
</script>
</body>
</html>

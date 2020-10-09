<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>

<body id="page-top">

 <?php include("header.php"); ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <div class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Transaction Status</button></div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Transaction Status</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:14px;
                      font-weight:bold;
                  }
                  </style>
                <thead>
                  <tr>
                    <th>Transaction Status</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
$site=$conn->query("select * from transaction");
while($row=$site->fetch_assoc()){ ?>
                  <tr>
    <td><?php echo $row['status']; ?></td>
    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs fillz" data-toggle="modal" data-target="#edit"
    data-id="<?php echo $row['id']; ?>"
    data-status="<?php echo $row['status']; ?>"
    > Edit</a></td>
    <td><a data-delete_id="transaction_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:55px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a></td>
    </tr> 
<?php }
?>
                                 
                </tbody>
              </table>
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
                <form action="transaction_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Transaction Status</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Transaction Status </label>
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
                <form action="transaction_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Transaction Status</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Transaction Status </label>
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

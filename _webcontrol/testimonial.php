
<?php 
    require '../conn.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['login'])){
            require 'add-test.php';
        }elseif(isset($_POST['update'])){
            require 'update-test.php';
        }

    }
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

 <?php include("header.php"); ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <div class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Testimony</button></div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Testimony </div>
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
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Product Name</th>
                    <th>City</th>
                    <th>Testimony</th>
                    <!-- <th>Date Created</th> -->
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
$site=$conn->query("select * from testimonial order by id DESC");
while($row=$site->fetch_assoc()){ ?>
                  <tr>
                  <td>
    <img src="../testimonial-image/<?php echo $row['img']; ?>" style="height:50px;width:50px;" alt="">
    </td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['product_name']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['text']; ?></td>
    <!-- <td><?php //echo $row['created_date']; ?></td> -->
    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs fillz" data-toggle="modal" data-target="#edit"
    data-id="<?php echo $row['id']; ?>"
    data-level="<?php echo $row['name']; ?>"
    data-city="<?php echo $row['city']; ?>"
    data-text="<?php echo $row['text']; ?>"
    data-commission="<?php echo $row['product_name']; ?>"
    data-bonus1="<?php echo $row['img']; ?>"
    > Edit</a></td>
    <td><a data-delete_id="delete-test?id=<?php echo $row['id']; ?>&himg=<?php echo $row['img']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" class="btn-danger btn-xs delz" data-target="#delete" data-toggle="modal"> Delete</a></td>
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
                <form action="testimonial" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Testimony</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Fullname </label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Product Name </label>
                                        <input type="text" name="pname" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>City </label>
                                        <input type="text" name="city" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Testimony </label>
                                        <textarea name="text" id="" placeholder="Maximium of 40 words" cols="" rows=""  class="form-control form-control-sm"></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Customer Image </label>
                                        <input type="file" name="img" class="form-control-files form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Add Testimony</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="testimonial" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Testimony</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Fullname </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="name" id="form-level" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Product Name </label>
                                        <input type="text" name="pname" id="form-commission" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>City </label>
                                        <input type="text" id="form-city" name="city" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Testimony </label>
                                        <textarea name="text" id="form-text" placeholder="Maximium of 40 words" cols="" rows=""  class="form-control form-control-sm"></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Optional </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himg" id="form-bonus1">
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update Testimony </button>
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
  document.querySelector("#form-level").value=d.target.dataset.level;
  document.querySelector("#form-city").value=d.target.dataset.city;
  document.querySelector("#form-text").value=d.target.dataset.text;
  document.querySelector("#form-commission").value=d.target.dataset.commission;
  document.querySelector("#form-bonus1").value=d.target.dataset.bonus1;
//   document.querySelector("#form-bonus2").value=d.target.dataset.bonus2;
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


<?php 
    // require 'clean.php';
// require("../conn.php");
// include 'remove-tag.php';
    

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
 
 if($r['privilege']=='staff'){
        //check if staff has accessibility
        $sp = $r['staff_privilege'];
        $ex = explode(',', $sp);
        if(!in_array('Slide', $ex)){
          header("Location:index");

        } 

      }

  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <div class="text-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Slide</button></div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Slide </div>
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
                    <th>Mobile Image</th>
                    <th>Destop Image</th>
                    <th>Title 1</th>
                    <th>Caption</th>
                    <th>Title 2</th>
                    <th>Title 3</th>
                    <th>URL</th>
                    <th colspan="2">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $site=$conn->query("select * from `dslide` order by id DESC");
                while($row=$site->fetch_assoc()){ ?>
                    <tr>
                    <td>
                    <img src="../_slide_images/<?php echo $row['dimg']; ?>" style="height:50px;width:50px;" alt="">
                    </td>
                    <td>
                    <img src="../_slide_images/<?php echo $row['dmobile']; ?>" style="height:50px;width:100px;" alt="">
                    </td>
                    <td><?php echo $row['dtitle1']; ?></td>
                    <td><?php echo $row['dcaption']; ?></td>
                    <td><?php echo remove_tags($row['dtitle2']); ?></td>
                    <td><?php echo remove_tags($row['dtitle3']); ?></td>
                    <td><?php echo $row['durl']; ?></td>
                    <!-- <td><?php //echo $row['created_date']; ?></td> -->
                    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillzd" data-toggle="modal" data-target="#edit<?php echo $row['dslide_id']; ?>"
                    data-id="<?php echo $row['dslide_id']; ?>"
                    data-dtitle1="<?php echo $row['dtitle1']; ?>"
                    data-dtitle2="<?php echo $row['dtitle2']; ?>"
                    data-dtitle3="<?php echo $row['dtitle3']; ?>"
                    data-url="<?php echo $row['durl']; ?>"
                    data-dimg="<?php echo $row['dimg']; ?>"
                    data-dmobile="<?php echo $row['dmobile']; ?>"
                    > Edit</a></td>
                    <td><a data-delete_id="delete-test?id=<?php echo $row['dslide_id']; ?>&himg=<?php echo $row['dimg']; ?>&mob=<?php echo $row['dmobile']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" class="btn-danger btn-xs delz" data-target="#delete" data-toggle="modal"> Delete</a></td>
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
                <form action="add-slide" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Slide</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title 1 </label>
                                        <input type="text" name="name1" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Title 2 </label>
                                        <!-- <input type="text" name="name2" class="form-control form-control-sm" required> -->
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="" ></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Title 3</label>                                        
                                        <textarea name="name3" class="form-control form-control-sm ckeditor" id="" ></textarea>
                                        <!-- <input type="text" name="name3" class="form-control form-control-sm" required> -->
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Button Caption </label>
                                        <input type="text" name="cap" placeholder="Shop Now" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>URL </label>
                                        <input type="text" name="url" class="form-control form-control-sm" required>
                                        
                                    </div>
                                    
                                    <div class="row">                                    
                                    <div class="col-md-12">
                                    <div class="form-group required-field">
                                        <label>Mobile Image(510 X 480) </label> <br>
                                        <input type="file" name="img" required class="form-control-files form-control-sm" required>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group required-field">
                                        <label>Desktop Image(1350 X 500) </label> <br>
                                        <input type="file" name="imgs" required class="form-control-files form-control-sm" required>
                                    </div>
                                    </div>

                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Add Slide</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <?php 
            $slide = $conn->query("SELECT * FROM `dslide`");
            if($slide->num_rows>0){
                while($slider = $slide->fetch_assoc()): ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $slider['dslide_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="update-slide" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Slide</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title 1 </label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $slider['dslide_id']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="name1" id="form-dtitle1s" value="<?php echo $slider['dtitle1']; ?>" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Title 2 </label>
                                        <!-- <input type="text" name="name2" id="form-dtitle2" class="form-control form-control-sm" required> -->
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="form-dtitle2s" ><?php echo $slider['dtitle2']; ?></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Title 3 </label>
                                        <!-- <input type="text" id="form-dtitle3" name="name3" class="form-control form-control-sm" required> -->                                       
                                        <textarea name="name3" class="form-control form-control-sm ckeditor" id="form-dtitle3s" ><?php echo $slider['dtitle3']; ?></textarea>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Button Caption </label>
                                        <input type="text" name="cap" placeholder="Shop Now" value="<?php echo $slider['dcaption']; ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>URL </label>
                                        <input type="text" id="form-urls" name="url" value="<?php echo $slider['durl']; ?>" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Mobile Image(510 X 480) (Optional) </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himg" id="form-imgs" value="<?php echo $slider['dimg']; ?>">
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Desktop Image(1350 X 500) (Optional) </label>
                                        <input type="file" name="imgs" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himgs" id="form-imgs" value="<?php echo $slider['dmobile']; ?>">
                                    </div>

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update Slide </button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


                <?php endwhile; } ?>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<?php include("scripts.php"); ?>
<script>
document.querySelectorAll(".fillz").forEach(function(g){
g.addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
//   document.querySelector("#form-dtitle1").innerHTML=d.target.dataset.dtitle1;
//   document.querySelector("#form-dtitle2").innerHTML=d.target.dataset.dtitle2;
//   document.querySelector("#form-dtitle3").innerHTML=d.target.dataset.dtitle3;
//   CKEDITOR.instances['ckeditor1'].setData(d.target.dataset.dtitle1);
//   CKEDITOR.instances.ckeditor1.setData(d.target.dataset.dtitle1);
  document.querySelector("#form-url").value=d.target.dataset.url;
  document.querySelector("#form-img").value=d.target.dataset.dimg;
  document.querySelector("#form-imgs").value=d.target.dataset.dmobile;
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

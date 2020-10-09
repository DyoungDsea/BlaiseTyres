
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
  if ($r['privilege'] !='admin') {  
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
      if(!in_array('Blog', $ex)){
        header("Location:index");
      } 

  }
 ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <div class="text-right">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Blog</button></div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Blog </div>
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
                    <th>Title </th>
                    <th>Description</th>
                    <th colspan="2">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $site=$conn->query("select * from `dblog` order by id DESC");
                while($row=$site->fetch_assoc()){ ?>
                    <tr>
                    <td>
                    <img src="../_slide_blog/<?php echo $row['dimg']; ?>" style="height:50px;width:50px;" alt="">
                    </td>
                    <td><?php echo $row['dtitle']; ?></td>
                    <td><?php echo limit_text($row['ddesc'],15); ?></td>
                    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillzd" data-toggle="modal" data-target="#edit<?php echo $row['dblog_id']; ?>"
                    data-id="<?php echo $row['dblog_id']; ?>"
                    data-dtitle1="<?php echo $row['dtitle']; ?>"
                    data-dimg="<?php echo $row['dimg']; ?>"
                    > Edit</a></td>
                    <td><a data-delete_id="delete-blog?id=<?php echo $row['dblog_id']; ?>&img=<?php echo $row['dimg']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" class="btn-danger btn-xs delz" data-target="#delete" data-toggle="modal"> Delete</a></td>
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
     <?php include("footer.php"); 
     
     function limit_text($text,$limit){
        if(str_word_count($text, 0)>$limit){
            $word = str_word_count($text,2);
            $pos=array_keys($word);
            $text=substr($text,0,$pos[$limit]). '...';
        }
        return $text;
    }
    
     
     ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="add-blog" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">New Blog</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title  </label>
                                        <input type="text" name="name1" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Description </label>
                                        <!-- <input type="text" name="name2" class="form-control form-control-sm" required> -->
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="" ></textarea>
                                    </div>
                                   
                                    
                                    <div class="row">                                    
                                    <div class="col-md-12">
                                    <div class="form-group required-field">
                                        <label> Image(730 X 485) </label> <br>
                                        <input type="file" name="img" required class="form-control-files form-control-sm" required>
                                    </div>
                                    </div>
                                    

                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Add Blog</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <?php 
            $slide = $conn->query("SELECT * FROM `dblog`");
            if($slide->num_rows>0){
                while($slider = $slide->fetch_assoc()): ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $slider['dblog_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="update-blog" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Blog</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title  </label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $slider['dblog_id']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="name1" id="form-dtitle1s" value="<?php echo $slider['dtitle']; ?>" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Description </label>
                                        <!-- <input type="text" name="name2" id="form-dtitle2" class="form-control form-control-sm" required> -->
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="form-dtitle2s" ><?php echo $slider['ddesc']; ?></textarea>
                                    </div>
                                   
                                    <div class="form-group required-field">
                                    <label> Image(730 X 485) (Optional) </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himg" id="form-imgs" value="<?php echo $slider['dimg']; ?>">
                                    </div>


                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update Blog </button>
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

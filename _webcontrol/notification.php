
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
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
    if(!in_array('Notification', $ex)){
      header("Location:dashboard");

    } 

  }
  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      <div class="text-rights">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add">Add New Notification</button></div>
      <br>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Notification </div>
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
                    <th>URL </th>
                    <th>Description</th>
                    <th>Starting Date</th>
                    <th>Expiring Date</th>
                    <th colspan="2">---</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $site=$conn->query("select * from `notifivcation` order by id DESC");
                if($site->num_rows>0){
                while($row=$site->fetch_assoc()){ ?>
                    <tr>
                    <td>
                    <img src="../_slide_blog/<?php echo $row['dimg']; ?>" style="height:50px;width:50px;" alt="">
                    </td>
                    <td><?php echo $row['dtitle']; ?></td>
                    <td><?php echo $row['durl']; ?></td>
                    <td><?php echo limit_text($row['ddesc'],15); ?></td>
                    <td><?php echo date("d M, Y",strtotime($row['dstart'])); ?></td>
                    <td><?php echo date("d M, Y",strtotime($row['dend'])); ?></td>
                    <td><a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillzd" data-toggle="modal" data-target="#edit<?php echo $row['notid']; ?>">Edit</a></td>
                    <td>
                        <?php if($row['dstatus']=='active'){ ?>
                        <a id="not" notid="<?php echo $row['notid']; ?>" text="inactive" dis="Disable" style="cursor:pointer;text-decoration:none;height:20px;width:55px;padding-left:7px;" type="button" class="btn-danger btn-xs " > Disable</a>
                        <?php }else{?>
                            <a id="not" notid="<?php echo $row['notid']; ?>"  dis="Enable" text="active" style="cursor:pointer;text-decoration:none;height:20px;width:55px;padding-left:7px;" type="button" class="btn-danger btn-xs " > Enable</a>
                       <?php  } ?>
                    </td>
                    </tr> 
                <?php } }else{
                    echo "<tr><td colspan='8' class='text-danger' >No result found </td></tr>";
                }
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
                <form action="add-not" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">New Notification</h3>
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
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="form-dtitle2s" ></textarea>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group required-field">
                                              <label>Starting Date  </label>
                                              <input type="text" id="datepicker" name="start" class="form-control form-control-sm datepicker" required>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group required-field">
                                              <label>Expiring Date  </label>
                                              <input type="text" name="end" id="picker" class="form-control form-control-sm datepicker2" required>
                                          </div>
                                        </div>
                                      </div>
                                    <div class="form-group required-field">
                                        <label>URL(Optional) </label>
                                        <input type="text" name="name3" id="form-dtitle1s" class="form-control form-control-sm" >
                                    </div>
                                   
                                    <div class="form-group required-field">
                                    <label> Image(730 X 485) (Optional) </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="login" class="btn btn-primary btn-sm">Add </button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <?php 
            $slide = $conn->query("SELECT * FROM `notifivcation`");
            if($slide->num_rows>0){
                while($slider = $slide->fetch_assoc()): ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $slider['notid']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="update-not" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Notification</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Title  </label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $slider['notid']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="name1" id="form-dtitle1s" value="<?php echo $slider['dtitle']; ?>" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Description </label>
                                        <textarea name="name2" class="form-control form-control-sm ckeditor" id="form-dtitle2s" ><?php echo $slider['ddesc']; ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group required-field">
                                              <label>Starting Date  </label>
                                              <input type="text" id="datepicker" value="<?php echo $slider['dstart']; ?>"  name="start" class="form-control form-control-sm datepicker" required>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group required-field">
                                              <label>Expiring Date  </label>
                                              <input type="text" name="end" id="picker" value="<?php echo $slider['dend']; ?>"  class="form-control form-control-sm datepicker2" required>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="form-group required-field">
                                        <label>URL(Optional) </label>
                                        <input type="text" name="name3" id="form-dtitle1s" value="<?php echo $slider['durl']; ?>" class="form-control form-control-sm" >
                                    </div>
                                   
                                    <div class="form-group required-field">
                                    <label> Image(730 X 485) (Optional) </label>
                                        <input type="file" name="img" class="form-control-file form-control-sm" >
                                        <input type="hidden" name="himg" id="form-imgs" value="<?php echo $slider['dimg']; ?>">
                                    </div>


                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update Notification </button>
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



$(document).ready(function(){
    $(document).on("click", "#not",function(){
        var id = $(this).attr("notid");
        var text = $(this).attr("text");
        var dis = $(this).attr("dis");
        // alert(id);
        Swal.fire({
        position: 'center',
        type: 'warning',
        title: dis+' this?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {Not:1,id:id,text:text}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Confirmed!'});
                setInterval(function(){
                    window.location.assign("notification");
                },2000)
            })
            .fail(function(){
                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
            });
        }

    });
    })
})
</script>
</body>
</html>

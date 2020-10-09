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
<style>
#fee, #ree{
  display:none;
}

#doMe:hover, #soMe:hover{
  color:blue;
  cursor:pointer;
}
</style>

</head>

<body id="page-top">

 <?php include("header.php"); 
 if ($r['privilege'] !='admin') {  
    $sp = $r['dprivilege'];
    $ex = explode(',', $sp);
      if(!in_array('Site Setting', $ex)){
        header("Location:index");
      } 

  }
  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
      
      <div class="row my-3">
        <div class="col-md-4">
        <?php $ree = $conn->query("SELECT * FROM dpercent ")->fetch_assoc(); ?>
        <p id="soMe">Referral Percentage: <?php echo number_format($ree['reef']); ?>% &nbsp;&nbsp;   <i class="fa fa-edit text-primary" title="Click here"></i> </p>
        <p>            
            <form class="form-inline"  action="reef" method="post"  id="ree" style="width:60%">
              <input type="text" class="form-control mb-2 mr-sm-2 form-control-sm" required  value="<?php echo $ree['reef']; ?>" name="fees">
              <button type="submit" class="btn btn-primary mb-2 btn-sm">Update</button>
            </form>
        </p>
        </div>
        <div class="col-md-4">
        <?php $fee = $conn->query("SELECT * FROM charge ")->fetch_assoc(); ?>
          <p class="" id="doMe">Withdrawal Limit:: &#8358;<?php echo number_format($fee['fees']); ?> &nbsp;&nbsp;  <i class="fa fa-edit text-primary" title="Click here"></i> </p>
          <p>            
            <form class="form-inline"  action="fee" method="post"  id="fee" style="width:60%">
              <input type="text" class="form-control mb-2 mr-sm-2 form-control-sm" required  value="<?php echo $fee['fees']; ?>" name="fees">
              <button type="submit" class="btn btn-primary mb-2 btn-sm">Update</button>
            </form>
          </p>
        </div>
      </div>

 <!-- DataTables Example -->
 <div class="card my-3 ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Website Details</div>
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
                    <th>Title</th>
                    <th>Phone </th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Instagram</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
<?php
$site=$conn->query("select * from `_security` WHERE privilege='Admin'");
while($row=$site->fetch_assoc()){ ?>
    <td><?php echo $row['dtitle']; ?></td>
    <td><?php echo $row['dphone']; ?></td>
    <td><?php echo $row['demail']; ?></td>
    <td><?php echo $row['dwebsite']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td style="min-width:50px;word-break:break-all;"><?php echo $row['social_fb']; ?></td>
    <td style="min-width:50px;word-break:break-all;"><?php echo $row['social_tw']; ?></td>
    <td style="min-width:50px;word-break:break-all;"><?php echo $row['social_in']; ?></td>    <td><a style="height:20px;width:30px;padding-left:5px;cursor:pointer;" type="button" class="btn-xs fillz" data-toggle="modal" data-target="#edit"
    data-id="<?php echo $row['id']; ?>"
    data-title="<?php echo $row['dtitle']; ?>"
    data-phone="<?php echo $row['dphone']; ?>"
    data-email="<?php echo $row['demail']; ?>"
    data-web="<?php echo $row['dwebsite']; ?>"
    data-address="<?php echo $row['address']; ?>"
    data-facebook="<?php echo $row['social_fb']; ?>"
    data-twitter="<?php echo $row['social_tw']; ?>"
    data-instagram="<?php echo $row['social_in']; ?>"
    > Edit</a></td>
<?php }
?>
                  </tr>                 
                </tbody>
              </table>
            </div>
          </div>
         
        </div>


        <div class="card my-4 ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Website Setting</div>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description </th>
                    <th>--- </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              $site=$conn->query("select * from `blaise_set`");
              while($row=$site->fetch_assoc()){ ?>
                  <tr>
              
                  <td><?php echo ucwords($row['dtitle']); ?></td>
                  <td><img src="../_slide_images/<?php echo $row['dimg']; ?>" style="height:50px;width:50px;" alt=""></td>
                  <td><?php echo limit_texts($row['ddesc'],20); ?></td>
                  <td><a style="height:20px;width:30px;padding-left:5px;cursor:pointer;" type="button" class="btn-xs fillz" data-toggle="modal" data-target="#edited<?php echo $row['id']; ?>"
                  > Edit</a></td>
                  </tr>  
              <?php } ?>
                                
                </tbody>
              </table>
            </div>
          </div>
          
        </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     <?php include("footer.php");
     function limit_texts($text,$limit){
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

  <?php
    $site=$conn->query("select * from `blaise_set`");
    while($row=$site->fetch_assoc()){ ?>
  <div class="modal fade" id="edited<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5><?php echo ucwords($row['dtitle']); ?> Setting</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update-setting" method="post" enctype="multipart/form-data">
            <div class="form-group required-field bg-primaryd">
              <input type="text" class="form-control" disabled value="<?php echo ucwords($row['dtitle']); ?>">
              <input type="hidden" name="id" value="<?php echo $row['bid']; ?>">
              <input type="hidden" name="imgb" value="<?php echo $row['dimg']; ?>">
            </div>
            <div class="form-group">
              <textarea name="desc" id="" cols="30" rows="10" class="form-control form-control-sm ckeditor">
                <?php echo $row['ddesc']; ?>
              </textarea>
            </div>
            <div class="form-group required-field bg-primaryd">
            <label for="g"> Optional </label>
              <input type="file" name="img" class="form-control-file">
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="updated">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="update_site" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Website Details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Website Name </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="name" id="form-name" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Phone Number </label>
                                        <input type="text" name="phone" id="form-phone" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Email </label>
                                        <input type="email" name="email" id="form-email" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Address </label>
                                        <input type="text" name="address" id="form-address" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Website </label>
                                        <input type="text" name="web" id="form-web" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>facebook link </label>
                                        <input type="text" name="facebook" id="form-facebook" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Twitter link </label>
                                        <input type="text" name="twitter" id="form-twitter" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="form-group required-field">
                                        <label>Instagram link </label>
                                        <input type="text" name="instagram" id="form-instagram" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Settings</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php include("scripts.php"); ?>
<script>
document.querySelector(".fillz").addEventListener("click",function(d){
  document.querySelector("#form-id").value=d.target.dataset.id;
  document.querySelector("#form-name").value=d.target.dataset.title;
  document.querySelector("#form-phone").value=d.target.dataset.phone;
  document.querySelector("#form-email").value=d.target.dataset.email;
  document.querySelector("#form-web").value=d.target.dataset.web;
  document.querySelector("#form-address").value=d.target.dataset.address;
  document.querySelector("#form-facebook").value=d.target.dataset.facebook;
  document.querySelector("#form-twitter").value=d.target.dataset.twitter;
  document.querySelector("#form-instagram").value=d.target.dataset.instagram;
});

</script>
</body>

</html>

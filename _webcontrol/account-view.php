<?php
// require 'staff-only.php';
// $b = $_SESSION['admin'];
?><!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php include("styles.php"); ?>

</head>
<body id="page-top">
 <?php include("header.php"); 
//  if ($r['privilege'] !='admin') {  
//     $sp = $r['staff_privilege'];
//     $ex = explode(',', $sp);
//       if(!in_array('Customers', $ex)){
//         header("Location:index");
//       } 

//   }
  
  
  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>
<style>
.troop{
  display:inline;
}
.troop2{
  font-weight:bold;
  padding-left:10px;
  width:100px;
  height:30px;
  border-radius:10px;
  border:1px solid #0088cc;
}
.troop2::placeholder{
  font-weight:lighter;
  font-family:cursive;
}
.troop2:focus{
  border:none;
  border-radius:10px;
}
</style>
    <div id="content-wrapper">
      <div class="container-fluid">
      <?php
$del=$conn->query("select * from `_security` where userid='".$_GET['user_id']."'");
if($del->num_rows==1){
  while($row=$del->fetch_assoc()){
    $didi=$row['id'];
    $stats=$row['dstatus'];
    $ref=$row['userid'];
  }
      ?>
     <!-- <button class="btn btn-primary delz" data-delete_id="account_delete?id=<?php echo $didi; ?>" style="cursor:pointer;" data-toggle="modal" data-target="#delete">Delete Account</button> -->
      <!-- <button class="btn btn-primary" id="cry" data-toggle="modal" data-id="<?php echo $didi; ?>" data-target="#edit">Update Account Information</button> -->
      <?php
if($stats=="unban"){ ?>
 <a class="btn btn-primary" href="account_ban_unbans?user_id=<?php echo $ref; ?>&s=ban">Ban Account</a>
<?php }else{ ?>
  <a class="btn btn-primary" href="account_ban_unbans?user_id=<?php echo $ref; ?>&s=unban">Unban Account</a>
<?php }
      ?>
   
      
     <?php } ?>
     <br>
      <br>
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user"></i>
            Account Information</div>
          <div class="card-body">
          <div class="row">
           <div class="col-md-1">
          
          </div>
          <div class="col-md-10">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <style>
                  tr,th,td{
                      font-size:15px;
                      /* font-weight:bold; */
                  }
                  th{
                    width:200px;
                  }
                  td{
                    color:#0088cc;
                    font-size:15px;
                    font-family:arial;
                  }
                  </style>
                  <tbody>
                  <?php
                $query1=$conn->query("select * from `_security` where userid='".$_GET['user_id']."'");
                if($query1->num_rows>0){ 
                    while($row=$query1->fetch_assoc()){
                    ?>
                    <tr><th>user ID</th><td><?php echo $row['userid']; ?></td></tr>
                    <tr><th>Full Name</th><td><?php echo $row['uname']; ?></td></tr>
                  <tr><th>Email Address</th><td><?php echo $row['email']; ?></td></tr>
                  <tr><th>Phone Number</th><td><?php echo $row['dphone']; ?></td></tr>
                  <tr><th>Privilege</th><td><?php  echo $row['dprivilege']; ?> </td></tr>
                  <tr><th>Status</th><td><?php if($row['dstatus']=='unban'){ echo 'Active'; }else{ echo 'Inactive'; } ?> </td></tr>
                  </tr>
                <?php
                    }
            }else{ ?>
                <tr><td>Account does not exist.</td></tr>
               <?php }
                  ?>
                                              
                </tbody>
              </table>
              


              <?php 
                      $sub = $conn->real_escape_string($_GET['user_id']);
                      $sql = $conn->query("SELECT * FROM _security INNER JOIN dtracker ON _security.userid=dtracker.dstaff_id WHERE dtracker.dstaff_id='$sub' ORDER BY dtracker.id DESC");
                      if($sql->num_rows>0){?>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <style>
                        tr,th,td{
                            font-size:12px;
                            font-weight:bold;
                        }
                        </style>
                      <thead>
                        <tr>
                          <th>Staff ID</th>
                          <th>Staff Name</th>
                          <th >Details</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>

                      
                       <?php while($top=$sql->fetch_assoc()){?>
                        <tr>
                        <td><?php echo $top['dstaff_id']; ?> </td>
                        <td><?php echo $top['uname']; ?></td>
                        <td><?php echo $top['dstatus']; ?></td>
                        <td><?php echo date("M d, Y h:ia",strtotime($top['ddate'])); ?></td>
                        
                        </tr>

                      <?php  } ?>


                      </tbody>
                      </table>
                      <?php  } ?>
            </div>
          </div>
         
          </div>
            
            
          </div>
          
          <!-- <div class="card-footer small text-muted">
          Updated Last at : 
          </div> -->
          
        </div>
      </div>
      
    <!-- DataTables Example -->

      <!-- Sticky Footer -->
     <?php include("../_webcontrol/footer.php"); ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:600px;">
            <div class="modal-content">
                <form action="account_update2" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Update Account Information</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                    <div class="modal-body viewing">

                    </div><!-- End .modal-body -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update</button>
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
<script>
$("#cry").on("click",function(d){
$.ajax({
url:"account_update.php",
type:"POST",
data:{id:d.target.dataset.id},
success:function(result){
$(".viewing").html(result);
}
});
});
</script>
</body>
</html>



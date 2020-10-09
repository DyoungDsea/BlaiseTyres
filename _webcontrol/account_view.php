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
$del=$conn->query("select * from login where userid='".$_GET['userid']."'");
if($del->num_rows==1){
  while($row=$del->fetch_assoc()){
    $didi=$row['id'];
    $stats=$row['dstatuss'];
    $ref=$row['userid'];
  }
      ?>
     <button class="btn btn-primary delz" data-delete_id="account_delete?id=<?php echo $didi; ?>" style="cursor:pointer;" data-toggle="modal" data-target="#delete">Delete Account</button>
      <!-- <button class="btn btn-primary" id="cry" data-toggle="modal" data-id="<?php echo $didi; ?>" data-target="#edit">Update Account Information</button> -->
      <?php
if($stats=="active"){ ?>
 <a class="btn btn-primary" href="account_ban_unban?referral_id=<?php echo $ref; ?>&s=ban">Ban Account</a>
<?php }else{ ?>
  <a class="btn btn-primary" href="account_ban_unban?referral_id=<?php echo $ref; ?>&s=unban">Unban Account</a>
<?php }
      ?>
     <!-- <div style="background:#0088cc;border-radius:10px;display:inline-block;padding:2px;">
     <form action="account_wallet" method="post" class="troop">
      <input type="text" name="point" required placeholder="eg: +50" class="troop2">
      <input type="hidden" name="referral_id" required value="<?php echo $ref; ?>">
      <button class="btn btn-primary" style="border:1px solid grey;">Update Wallet Balance</button>
      </form>
     </div> -->
      
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
                $query1=$conn->query("select * from login where userid='".$_GET['userid']."'");
                if($query1->num_rows>0){ 
                    while($row=$query1->fetch_assoc()){
                    ?>
                    <tr><th>Referral ID</th><td><?php echo $row['userid']; ?></td></tr>
                    <tr><th>Full Name</th><td><?php echo $row['dname']; ?></td></tr>
                  <tr><th>Email Address</th><td><?php echo $row['demail']; ?></td></tr>
                  <tr><th>Phone Number</th><td><?php echo $row['dphone']; ?></td></tr>
                  <tr><th>Residential Address</th><td><?php echo $row['daddress']; ?></td></tr>
                  <tr><th>Status</th><td><?php echo $row['dstatuss']; ?></td></tr>
                  <tr><th>Referrer</th><td><?php   
                  $e = $conn->query("SELECT dname FROM login WHERE userid='".$row['referrer']."'");
                  if($e->num_rows>0){
                    $ee=$e->fetch_assoc();
                    echo $ee['dname'].' '.'('.$row['referrer'].')';
                  }
                  ?></td></tr>
                  <!-- <tr><th>Branch Registered</th><td><?php //echo $row['branch']; ?></td></tr> -->
                  <tr><th>Wallet Balance</th><td>&#8358;<?php echo number_format($row['dwallet'],2,'.',','); ?></td></tr>
                  <!-- <tr><th>Supervisor ID</th><td><?php //echo $row['supervisor_id']; ?></td></tr> -->
                  <tr><th>Date Registered</th><td><?php echo read_able($row['created_date']); ?></td></tr>
                  </tr>
                <?php
                    }
            }else{ ?>
                <tr><td>Account does not exist.</td></tr>
               <?php }
                  ?>
                                              
                </tbody>
              </table>
              
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
     <?php include("footer.php"); ?>

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



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
      if(!in_array('Coupon', $ex)){
        header("Location:index");
      } 

  }
  
  ?>

  <div id="wrapper">

  <?php include("aside.php"); ?>

    <div id="content-wrapper">
<style>
.it{
  height:50px;
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  font-size:17px;
  font-weight:bold;
}
.form-control{
  border-color:0px #d2d6de !important;
}
.sweep,.sweep2{
  box-shadow:0px 10px 10px 0px rgba(0,0,0,0.19);
  padding-top:10px;
  padding-left:10px;
  width:20%;
  border:1px solid #d2d6de !important;
}
</style>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-9">
      <!-- <form method="post" action="category_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="name" value="<?php //if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
               
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form> -->
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Coupon</button>
      </div>
              
             </div>
      
      <br>

      <?php
        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
                } 
                $total_records_per_page = 30;

      ?>
 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Coupon <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
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
                    <th>Coupon</th>
                    <th>Percentage(%) discount</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Expire Date</th>
                    <th colspan="3">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
 

if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
  
    $sqls=$conn->query("SELECT * from dcoupon order by id DESC");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $site=$conn->query("SELECT * from dcoupon where status='active' AND name LIKE '%$sname%' order by id DESC LIMIT $start_from, $total_records_per_page");
}else{
  
    $sqls=$conn->query("SELECT * from dcoupon order by id DESC");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $site=$conn->query("SELECT * from dcoupon order by id DESC LIMIT $start_from, $total_records_per_page");
  
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['dcode']; ?></td>
<td><?php echo $row['dpercent']; ?></td>
<td><?php echo $row['dstatus']; ?></td>
<td><?php echo date("d M Y", strtotime($row['dstart'])); ?></td>
<td><?php echo date("d M Y", strtotime($row['dend'])); ?></td>
<td>
    <?php if($row['dstatus']=='off'){ ?>
      <button text="on" id="coup" coup="<?php echo $row['dcopid']; ?>" class="btn btn-sm btn-primary">On</button>
   <?php }else{ ?>
    <button text="off" id="coup" coup="<?php echo $row['dcopid']; ?>" class="btn btn-sm btn-primary">Off</button>
   <?php } ?>
</td>
<td>
<a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillzx" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"
data-id="<?php echo $row['id']; ?>"
data-name="<?php echo $row['name']; ?>"
> Edit</a>
</td>
<td>
<a data-delete_id="coupon_delete?id=<?php echo $row['dcopid']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>

</td>
</tr> 
<?php }
}else{
  echo "<tr><td colspan=7>No results Found</td></tr>";
}
?>
                                 
                </tbody>
              </table>
            </div>
          </div>


                           
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">
<?php

if(isset($_GET['name'])){

}else{
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
        echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
    
    }
}
?>
				</ul>
                            </div>

          
        </div>
      </div>
    <!-- DataTables Example -->

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
                <form action="coupon_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Coupon</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Coupon Code </label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Coupon Percentage </label>
                                        <select name="percent" id="" class="form-control form-control-sm" required>
                                        <option value="">Choose Percentage</option>
                                        
                                        <?php
                                        for($i=1; $i<=100; $i++){
                                            echo'<option value="'.$i.'">'.$i.'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Start Date </label>
                                            <input type="text" name="starts" class="form-control form-control-sm datepicker2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Expire Date </label>
                                            <input type="text" name="ends" class="form-control form-control-sm datepicker" required>
                                        </div>
                                    </div>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Coupon</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<?php
    $site=$conn->query("SELECT * from dcoupon order by id DESC LIMIT $start_from, $total_records_per_page");
    if($site->num_rows>0){
        while($row=$site->fetch_assoc()):
    
    ?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="coupon_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Coupon</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Coupon Code </label>
                                        <input type="hidden" name="id" id="form-ids" value="<?php echo $row['dcopid']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="name" id="form-names" value="<?php echo $row['dcode']; ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Coupon Code </label>
                                        <select name="percent" id="" class="form-control form-control-sm" required>
                                        <option value="">Choose Percentage</option>
                                        
                                        <?php
                                        for($i=1; $i<=100; $i++){?>
                                            <option <?php if($row['dpercent']==$i){echo 'selected';} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                       <?php }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Start Date </label>
                                            <input type="text" name="starts"  value="<?php echo $row['dstart']; ?>" class="form-control form-control-sm datepicker2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label>Expire Date </label>
                                            <input type="text" name="ends"  value="<?php echo $row['dend']; ?>" class="form-control form-control-sm datepicker" required>
                                        </div>
                                    </div>
                                    </div>
                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update </button>
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
  document.querySelector("#form-name").value=d.target.dataset.name;
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

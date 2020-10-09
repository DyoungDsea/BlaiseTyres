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
    $sp = $r['staff_privilege'];
    $ex = explode(',', $sp);
      if(!in_array('Delivery', $ex)){
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
      <form method="post" action="category_filter" id="tarp">
               <div class="col-md-6" style="float:left;">
                 <div class="form-group">
                   <input type="text" placeholder="Search For" name="named" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
              
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Delivery</button>
      </div>
              
             </div>
      
      <br>

      <?php
          if (isset($_GET['page_no']) && $_GET['page_no']!="") {
              $page_no = $_GET['page_no'];
              } else {
                  $page_no = 1;
                  } 
                  $total_records_per_page = 100;

              ?>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Delivery Option <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
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
                    <th>Service Option/Delivery Area </th>
                    <th>Delivery Charges(&#8358;) </th>
                    <th>Category</th>
                    <!-- <th>Date Created</th> -->
                    <!-- <th>Date Updated</th> -->
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php


if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
    $site=$conn->query("select * from ddelivery where status='active' AND dcategory LIKE '%$sname%' OR dprice LIKE '%$sname%' order by id DESC LIMIT $start_from, $total_records_per_page");
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    $sqls=$conn->query("select * from ddelivery where status='active' order by dcategory");
    // $start=(($_GET['page'])-1)*$per_page;
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $site=$conn->query("select * from ddelivery where status='active' order by dcategory LIMIT $start_from, $total_records_per_page");
  }else{
    $sqls=$conn->query("select * from ddelivery where status='active' order by dcategory ");
    
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $site=$conn->query("select * from ddelivery where status='active' order by dcategory LIMIT $start_from, $total_records_per_page");
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['dlocation']; ?></td>
<td><?php echo $row['dprice']; ?></td>
<td><?php echo $row['dcategory']; ?></td>
<td>
<a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillz" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"

> Edit</a>
</td>
<td>
<a data-delete_id="delivery_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>
</td>
</tr> 
<?php }
}else{
  echo "<tr><td colspan=5>No results Found</td></tr>";
}
?>
                                 
                </tbody>
              </table>
            </div>
          </div>


             <!-- Updated Last at :  -->
                              
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">
<?php


    if(isset($_GET['pro_name'])){
      for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
        // $pname = $_GET["pro_name"];
        echo "<li  class='page-item '><a class='page-link' href='orders?page_no=$counter&pro_name=".$_GET['pro_name']."' style='color:#0088cc;'>$counter</a></li>"; 

      }
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
                <form action="delivery_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Delivery Option</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                    <div class="form-group required-field">
                                        <label>Delivery Method </label>
                                        <select name="cate" id="" required class="form-control form-control-sm">
                                        <option value="">Choose Delivery Method</option>
                                        <option value="Delivery Area">Delivery Area</option>
                                        <option value="Delivery Station">Delivery Station</option>
                                        </select>
                                      
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Location </label>
                                        <input type="text" name="lname" placeholder="eg Yaba Area" class="form-control form-control-sm" required>
                                      
                                    </div>

                                   <div class="form-group required-field">
                                        <label>Charges </label>
                                        <input type="text" name="cname" placeholder="eg 1000" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" name="name" class="btn btn-primary btn-sm">Submit</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


<?php
 $site=$conn->query("select * from ddelivery where status='active' order by dlocation LIMIT $start_from, $total_records_per_page");
 if($site->num_rows>0):
    while($row=$site->fetch_assoc()):?>
      <!-- Modal -->
      <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="delivery_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Delivery Option</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                    <div class="form-group required-field">
                                        <label>Delivery Method </label>
                                        <select name="cate" id="" required class="form-control form-control-sm">
                                        <option value="">Choose Delivery Method</option>
                                        <option value="Delivery Area" <?php if($row['dcategory']=='Delivery Area'){ echo "selected"; }?>>Delivery Area</option>
                                        <option value="Delivery Station" <?php if($row['dcategory']=='Delivery Station'){ echo "selected"; }?>>Delivery Station</option>
                                        </select>
                                      
                                    </div>
                                    
                                   <div class="form-group required-field">
                                        <label> Location</label>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control form-control-sm" required>
                                        <input type="text" name="lname" value="<?php echo $row['dlocation']; ?>" class="form-control form-control-sm" required>
                                    </div>

                                    <div class="form-group required-field">
                                        <label>Charges </label>
                                        <input type="text" name="cname" placeholder="eg 1000" value="<?php echo $row['dprice']; ?>"  class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="name" class="btn btn-primary btn-sm">Update </button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
                                    <?php endwhile; endif; ?>
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

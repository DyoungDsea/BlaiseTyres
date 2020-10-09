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
      if(!in_array('Star Rating', $ex)){
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
                   <input type="text" placeholder="Search For" name="namedr" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
              
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <!-- <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Delivery</button> -->
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
            Manage Star Rating <span class="text-danger"><?php if(isset($_GET['page_no']) AND @$_GET['page_no'] !=0){ echo "(".$_GET['page_no'].")";} ?></span></div>
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
                    <th>Name </th>
                    <th>Description</th>
                    <th>Star</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php




if(isset($_GET['name']) ){

    $sqls=$conn->query("SELECT * from `drating` INNER JOIN products ON drating.dpid=products.dpid  order by drating.id DESC ");
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $sname=$conn->real_escape_string($_GET['name']);
    $site=$conn->query("SELECT * from `drating` INNER JOIN products ON drating.dpid=products.dpid where drating.dname LIKE '%$sname%' OR drating.dstar LIKE '%$sname%' order by drating.id DESC LIMIT $start_from, $total_records_per_page");
}else{
    $sqls=$conn->query("SELECT * from `drating` INNER JOIN products ON drating.dpid=products.dpid  ORDER BY drating.dstatus='inactive' ");
    
    $total_records =$sqls->num_rows;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $start_from = ($page_no - 1) * $total_records_per_page;
    $site=$conn->query("SELECT * from `drating` INNER JOIN products ON drating.dpid=products.dpid ORDER BY drating.dstatus='inactive' LIMIT $start_from, $total_records_per_page");
 
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
    <td>
        <img src="../_product_images/<?php echo $row['dimg1']; ?>" style="height:50px;width:50px;" alt="">
    </td>
<td><?php echo $row['dname']; ?></td>
<td><?php echo $row['ddesc']; ?></td>
<td><?php echo $row['dstar']; ?></td>
<td>
<?php if($row['dstatus']=='inactive'){?>
<a style="height:20px;width:70px;padding-left:7pxc;cursor:pointer;text-align:center" type="button" class="btn-xs btn-info fillz" id="actives" pid="<?php echo $row['drat_id']; ?>" > Approve</a>
<?php }else{?>
    <a style="cursor:pointer;text-align:center font-size:20px;padding:4px" type="button" class="btn-xs btn-success fillz text-light"  > <i class="fa fa-check "></i> Approved </a>
    <?php } ?>
</td>
<td>
<a data-delete_id="star_delete?id=<?php echo $row['drat_id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>
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






$(document).ready(function(){
    $(document).on("click", "#actives",function(){
        var id = $(this).attr("pid");
        // alert(id);
        Swal.fire({
        position: 'center',
        type: 'warning',
        title:'Approve this?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
        
      }).then((result) => {
        if (result.value){
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {star:1,id:id}
            })
            .done(function(response){
                Swal.fire({type: 'success', title:'Approved!'});
                setInterval(function(){
                    window.location.assign("star-rating");
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

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
      if(!in_array('Category', $ex)){
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
                   <input type="text" placeholder="Search For" name="name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" class="form-control it">
                 </div>
               </div>
               
               <div class="col-md-3" style="float:left;">
                 <button type="submit" name="gfsa" id="gdate" style="border-radius:5px;" class="btn btn-primary btn-block it"><i class="fa fa-search" style="margin-right:20px;"></i>Filter</button>
               </div>
             </form>
      </div>
      <div class="col-md-3"><button class="btn btn-primary it" data-toggle="modal" data-target="#add">Add New Category</button>
      </div>
              
             </div>
      
      <br>

      <?php
                //    $page_name="pagination.php"; 
                   // $start=$_GET['start'];	
                   if(isset($_GET['start'])){
                   if(!($_GET['start'] > 0)) { 
                   $start = $_GET['start'];
                   }else{
                       $start = $_GET['start'];
                   }
                   }else{
                       $start=0;
                   }
               
                   if(isset($_GET['p_f'])){ 
                       $p_f =$_GET['p_f'];                       
                   }else{
                       $p_f=0;
                   }
                   
                   $eu = ($start -0);                
                   $limit = 100; 
                   $this1 = $eu + $limit; 
                   $back = $eu - $limit; 
                   $next = $eu + $limit; 

                            ?>

 <!-- DataTables Example -->
 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Categories <span class="text-danger"><?php if(isset($_GET['start']) AND @$_GET['start'] !=0){ echo "(".$_GET['start'].")";} ?></span></div>
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
                    <th>Category Name</th>
                    <!-- <th>Date Created</th> -->
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
<?php
 $per_page=10;
 if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
  $count_all=$conn->query("select count(*) from categories where status='active' AND name LIKE '%$sname%' OR name LIKE '%$sname%'");
  $counter=$conn->query("select * from categories where status='active' AND name LIKE '%$sname%' OR name LIKE '%$sname%'");
  
  $nume=$counter->num_rows;
 }else{
  $count_all=$conn->query("select count(*) from categories WHERE status='active'");
  $counter=$conn->query("select * from categories where status='active'");
  
  $nume=$counter->num_rows;
 }



if(isset($_GET['name']) ){
  $sname=$conn->real_escape_string($_GET['name']);
    $site=$conn->query("select * from categories where status='active' AND name LIKE '%$sname%' order by id DESC LIMIT $eu, $limit");
}else{
  if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])){
    // $start=(($_GET['page'])-1)*$per_page;
    $site=$conn->query("select * from categories where status='active' order by name LIMIT $eu, $limit");
  }else{
    
    $site=$conn->query("select * from categories where status='active' order by name LIMIT $eu, $limit");
  }
}
if($site->num_rows>=1){
  while($row=$site->fetch_assoc()){ ?>
    <tr>
<td><?php echo $row['name']; ?></td>
<td>
<?php if($row['name'] !="Tyres"){ ?>
<a style="height:20px;width:40px;padding-left:7px;cursor:pointer;" type="button" class="btn-xs btn-info fillz" data-toggle="modal" data-target="#edit"
data-id="<?php echo $row['id']; ?>"
data-name="<?php echo $row['name']; ?>"
> Edit</a>
<?php } ?>
</td>
<td>
<?php if($row['name'] !="Tyres"){ ?>
<a data-delete_id="category_delete?id=<?php echo $row['id']; ?>" style="cursor:pointer;text-decoration:none;height:20px;width:50px;padding-left:7px;" type="button" data-target="#delete" data-toggle="modal" class="btn-danger btn-xs delz"> Delete</a>
<?php } ?>
</td>
</tr> 
<?php }
}else{
  echo "<tr><td colspan=4>No results Found</td></tr>";
}
?>
                                 
                </tbody>
              </table>
            </div>
          </div>


             <!-- Updated Last at :  -->
    <?php
//start pager
if($nume>$limit) { ?>                            
 <div class="card-footer small text-muted">
<ul class="pagination pagination-md justify-content-center">
<?php

///// Variables set for advance paging///////////
$p_limit=80; // This should be more than $limit and set to a value for whick links to be breaked
if(isset($_GET['p_f'])){
$p_f=$_GET['p_f'];								// To take care global variable if OFF
if(!($p_f > 0)) {                         // This variable is set to zero for the first page
$p_f = 0;
}
}


$p_fwd=$p_f+$p_limit;
$p_back=$p_f-$p_limit;


if(isset($_GET['name'])){


  if($p_f<>0){print "<li class='page-item'><a class='page-link' href='categories?pro_name=".$_GET['name']."&start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>&laquo; PREV $p_limit</font></a></li>"; }
  //// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
  if($back >=0 and ($back >=$p_f)) { 
  print "<li class='page-item'><a class='page-link' href='categories?name=".$_GET['name']."&start=$back&p_f=$p_f'><font face='Verdana' size='2'>&laquo; PREV</font></a></li>"; 
  } 
  //////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
  for($i=$p_f;$i < $nume and $i<($p_f+$p_limit); $i=$i+$limit){
  if($i <> $eu){
  $i2=$i+$p_f;
  $im=$i+1;
  echo " <li class='page-item'><a class='page-link' href='categories?name=".$_GET['name']."&start=$i&p_f=$p_f'><font face='Verdana' size='2'>$im</font></a> </li>";
  }
  else { 
  $im=$i+1;
  echo "<li class='page-item active'><a class='page-link' href='#'><font face='Verdana' size='2' >$im</font></a></li>";
  }        /// Current page is not displayed as link and given font color red
  
  }
  
  
  ///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
  if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
  print "<li class='page-item'><a class='page-link' href='categories?name=".$_GET['name']."&start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT &raquo;</font></a></li>";} 
  if($p_fwd < $nume){
  print "<li class='page-item'><a class='page-link' href='categories?name=".$_GET['name']."&start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit &raquo;</font></a></li>"; 
  }
  
}else{
  if($p_f<>0){print "<li class='page-item'><a class='page-link' href='?start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>&laquo; PREV $p_limit</font></a></li>"; }
  //// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
  if($back >=0 and ($back >=$p_f)) { 
  print "<li class='page-item'><a class='page-link' href='?start=$back&p_f=$p_f'><font face='Verdana' size='2'>&laquo; PREV</font></a></li>"; 
  } 
  //////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
  for($i=$p_f;$i < $nume and $i<($p_f+$p_limit); $i=$i+$limit){
  if($i <> $eu){
  $i2=$i+$p_f;
  $im=$i+1;
  echo " <li class='page-item'><a class='page-link' href='?start=$i&p_f=$p_f'><font face='Verdana' size='2'>$im</font></a> </li>";
  }
  else { 
  $im=$i+1;
  echo "<li class='page-item active'><a class='page-link' href='#'><font face='Verdana' size='2' >$im</font></a></li>";
  }        /// Current page is not displayed as link and given font color red
  
  }
  
  
  ///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
  if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
  print "<li class='page-item'><a class='page-link' href='?start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT &raquo;</font></a></li>";} 
  if($p_fwd < $nume){
  print "<li class='page-item'><a class='page-link' href='?start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit &raquo;</font></a></li>"; 
  }

}
?>
				</ul>
                            </div>
<?php }
//end pager
 ?>	
          
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
                <form action="category_add" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Add Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->
                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Category </label>
                                        <input type="text" name="name" class="form-control form-control-sm" required>
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Add Category</button>
                    </div><!-- End .modal-footer -->
                </form>
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->



      <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="category_update" method="post">
                    <div class="modal-header">
                        <h3 class="modal-title" id="addressModalLabel">Edit Category</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div><!-- End .modal-header -->

                             <div class="modal-body">
                                   <div class="form-group required-field">
                                        <label>Category </label>
                                        <input type="hidden" name="id" id="form-id" class="form-control form-control-sm" required>
                                        <input type="text" name="name" id="form-name" class="form-control form-control-sm" required>
                                        <input type="hidden" name="names" id="form-names" class="form-control form-control-sm" >
                                    </div>

                    </div><!-- End .modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="log" class="btn btn-primary btn-sm">Update Category</button>
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
  document.querySelector("#form-name").value=d.target.dataset.name;
  document.querySelector("#form-names").value=d.target.dataset.name;
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

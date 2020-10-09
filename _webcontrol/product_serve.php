<?php
require("../conn.php");
if(isset($_POST['id'])){
    $view=$conn->query("select * from products where id='".$_POST['id']."'");
    while($row=$view->fetch_assoc()){
        
        ?>
<div class="row">
 <div class="col-md-6">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<?php if($row['dimg2'] !=''): ?>
<li data-target="#carousel-example-generic" data-slide-to="1" ></li>
<?php endif; ?>
<?php if($row['dimg3'] !=''): ?>
<li data-target="#carousel-example-generic" data-slide-to="2" ></li>
<?php endif; ?>
<?php if($row['dimg4'] !=''): ?>
<li data-target="#carousel-example-generic" data-slide-to="3" ></li>
<?php endif; ?>


</ol>

<div class="carousel-inner" role="listbox">
  <div class="carousel-item  active">
    <img src="../_product_images/<?php echo $row['dimg1']; ?>">
  </div>
<?php if($row['dimg2'] !=''): ?>
  <div class="carousel-item  ">
    <img src="../_product_images/<?php echo $row['dimg2']; ?>">
  </div>
<?php endif; ?>
<?php if($row['dimg2'] !=''): ?>
  <div class="carousel-item  ">
    <img src="../_product_images/<?php echo $row['dimg3']; ?>">
  </div>
<?php endif; ?>

<?php if($row['dimg4'] !=''): ?>
  <div class="carousel-item  ">
    <img src="../_product_images/<?php echo $row['dimg4']; ?>">
  </div>
<?php endif; ?>
</div>
<a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true" style="border:1px solid #0088cc;"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true" style="border:1px solid #0088cc;"></span>
<span class="sr-only">Next</span>
</a>
</div> 

<?php if($row['dldesc'] !=''):?>
<h4 class="mt-4">Product full Description:</h4> 
<p class="get_description" style="word-wrap:break-word"><?php echo $row['dldesc']; ?></p>
<?php endif; ?>
<?php if($row['dspec'] !=''):?>
<h4>Product  specification:</h4> 
<p class="get_description" style="word-wrap:break-word"><?php echo $row['dspec']; ?></p>

<?php endif; ?>
</div>


<div class="col-md-6">
<h1 class="get_name"><?php echo $row['dpname']; ?></h1>
<p class="tasha">
Product ID<span class="get_pm">: <?php echo $row['dpid']; ?></span><br>
SKU<span class="get_pm">: <?php echo $row['dsku']; ?></span><br>
Vendor Code<span class="get_pm">: <?php echo $row['dvcode']; ?></span>
<br>Price: <span class="get_price">&#8358;<?php echo number_format($row['dprice'],2); ?></span>
<br>Installment Price: <span class="get_sub">&#8358;<?php echo number_format($row['dinstall_price'],2); ?> </span>
<br>Category:<span class="get_pm"> <?php echo $row['dcategory']; ?></span>
<br>Sub Category:<span class="get_pm"> <?php echo $row['dsub_cat']; ?></span>
<br>Brand:<span class="get_pm"> <?php echo $row['dbrand']; ?></span>
<?php if($row['dwidth'] !=''): ?>
&nbsp; Width:<span class="get_pm"> <?php echo $row['dwidth']; ?></span>
<?php endif; ?>
<?php if($row['ddiscount'] !=''): ?>
&nbsp; Discount:<span class="get_pm"> &#8358;<?php echo number_format($row['ddiscount']); ?></span>
<?php endif; ?>

<?php if($row['dprofile'] !=''): ?>
<br> Profile:<span class="get_pm"> <?php echo $row['dprofile']; ?></span>
<?php endif; ?>

<?php if($row['drim'] !=''): ?>
&nbsp; Rim:<span class="get_pm"> <?php echo $row['drim']; ?></span>
<?php endif; ?>


<?php if($row['dplan2'] !=''): ?>
  <br><?php echo $row['dplan2']; ?>,
<?php endif; ?>

<?php if($row['dplan3'] !=''): ?>
<?php echo $row['dplan3']; ?>,
<?php endif; ?>

<?php if($row['dplan4'] !=''): ?>
&nbsp;<?php echo $row['dplan4']; ?>
<?php endif; ?>

<br>Created Date:<span class="get_pm"> <?php echo date("d M Y h:i:sa", strtotime($row['created_at'])); ?></span>

<br>Updated Date:<span class="get_pm"> <?php echo date("d M Y h:i:sa", strtotime($row['updated_at'])); ?></span>
</p>
<h4>Product short Description:</h4> 
<p class="get_description" style="word-wrap:break-word"><?php echo $row['dpdesc']; ?></p>
</div>
</div>
  <?php
    }
}
?>


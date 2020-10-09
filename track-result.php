<?php
// include("conn.php");



?>
<?php include("head.php"); 
require 'clean.php';
if(isset($_POST["trid"]) && !empty($_POST["trid"])){
	$trid=$conn->real_escape_string(htmlentities($_POST["trid"],ENT_QUOTES));
	if($trid=='') {
	$trid=$conn->real_escape_string(htmlentities($_GET["trid"],ENT_QUOTES));
	}
}else{
header("Location: track-order");
}

?>

<body>
	<!-- site -->
	<div class="site">
	<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
			<!-- site__body -->
			<div class="site__body">
			<div class="block post-view">
				<div class="post-view__header post-header post-header--has-image">
					<div class="post-header__image dodoi">
					</div>
					<div class="post-header__body">
						<h1 class="post-header__title dodo">Track Order [-<?php echo $trid; ?>-]</h1>
					</div>
				</div>
				<div class="container">
					<div class="post-view__body">
						<div class="post-view__item post-view__item-post" style="max-width:1000px;">
							<div class="post-view__card post">
								<div class="post__body typography">
                  
                <div class="block">
				<div class="container">

				<div class="row no-gutters">
					<?php

					if(isset($_POST['trid'])){
					$order = clean($trid);
					$sql = $conn->query("SELECT * FROM dcart INNER JOIN dcart_holder ON dcart.orderid=dcart_holder.orderid WHERE dcart.orderid='$order'");
					if($sql->num_rows>0){
						$ppname ='';
						while($row=$sql->fetch_assoc()):
							$total_bill = $row['dtotal_bill'];
							$charges = $row['dcharges'];
							$payment = $row['payment_status'];
							$status = $row['dstatus'];
							$ppname .= $row['pname'].' & ';
							
					?>
						<div class="col-md-4 col-lg-4 col-xl-4 bg-primarys">
							<div class="img bg-dangers" style="width:100%; padding:10px">
								<center>  
									
								<img style="max-width:45%; margin: 0 auto !important" src="_product_images/<?php echo $row['dimg'] ?>" alt="">
								</center>
							</div>
							
						</div>

						<div class="col-md-8 col-lg-8 col-xl-8 bg-primaryf">
							<h5><?php echo $row['pname'] ?></h5>
							<p><b>vendor code:</b> 	<?php echo $row['dvcode'] ?>&nbsp;&nbsp; <span><b>Sku:</b> <?php echo $row['dsku'] ?> </span> &nbsp;&nbsp; <br> <span><b>Brand:</b> <?php echo $row['dbrand'] ?></span> &nbsp;&nbsp;
							<b>Unit Price:</b> &#8358;<?php echo number_format($row['dprice']) ?> &nbsp;&nbsp;
							<b>Quantity:</b> <?php echo $row['dqty'] ?> <br><b>Charges: </b>&#8358;</b> <?php echo number_format($row['dcharge']) ?>&nbsp;&nbsp; 
							<b>Total:&#8358;</b> <?php echo number_format($row['dtotal']) ?>
							
								</p>
							
						</div>
						<?php endwhile;  ?>						
<!-- <div class="col-md-12"> <hr> </div> -->
							<div class="col-md-4">
							
							</div>
							<div class="col-md-6">
							<p>
							<b>Total Charges : </b> &#8358;<?php echo number_format($charges); ?>   &nbsp;&nbsp;
								<b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>  <br>
							<b>Payment Status:  </b> <?php echo ucfirst($payment); ?>  &nbsp;&nbsp;
							<b>Transaction Status: </b>  <?php echo ucfirst($status); ?> 
							</p>
							
							</div>

						<?php    
				}else{
					$sub = $conn->query("SELECT * FROM `dsub` WHERE subid='$order'");
					if($sub->num_rows>0){
						$row = $sub->fetch_assoc(); ?>

						<div class="col-md-4 col-lg-4 col-xl-4 bg-primarys">
							<div class="img bg-dangers" style="width:100%; padding:10px">
								<center>  
									
								<img style="max-width:45%; margin: 0 auto !important" src="_product_images/<?php echo $row['dimg'] ?>" alt="">
								</center>
							</div>
							
						</div>

						<div class="col-md-8 col-lg-8 col-xl-8 bg-primaryf">
							<h5><?php echo $row['pname'] ?></h5>
							<p><b>vendor code:</b> 	<?php echo $row['dvcode'] ?>&nbsp;&nbsp; <span><b>Sku:</b> <?php echo $row['dsku'] ?> </span> &nbsp;&nbsp; <br> <span><b>Brand:</b> <?php echo $row['dbrand'] ?></span> &nbsp;&nbsp;
							<b>Unit Price:</b> &#8358;<?php echo number_format($row['dprice']) ?> &nbsp;&nbsp;
							<b>Quantity:</b> <?php echo $row['dqty'] ?> &nbsp;&nbsp; <b>Charges: </b>&#8358;</b> <?php echo number_format($row['dcharge']) ?>  <br> 
							<b>Total:&#8358;</b> <?php echo number_format($row['dtotal']) ?>&nbsp;&nbsp;  <b>Transaction Status: </b><?php echo $row['dtrans_status'] ?> &nbsp;&nbsp; <b> Status: </b><?php echo $row['pstatus'] ?>
							
								</p>
							
						</div>

					<?php }else{ ?>

					<h3 class="text-danger">Sorry...Order ID <strong>[-<?php echo $trid; ?>-]</strong> does not exist</h3>
					<p>please recheck your Order ID and be sure you enter it correctly.</p>

					<?php }
				} ?>
					
					<?php  }?>
					


					</div>	
				</div>
			</div>




















</div>
</div>
</div>
</div>
</div>

</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div>
		<!-- site__body / end -->
		<!-- site__footer -->
		
			

	<?php include("block2.php"); ?>
		<?php include("footer.php"); ?>
	</div><!-- mobile-menu / end -->
	<?php include("mobile-header2.php"); ?>
	<!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
	<!-- quickview-modal / end -->
	
	<!-- photoswipe -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>
			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
						title="Close (Esc)"></button>
					<!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button
						class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button
						class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div><!-- photoswipe / end -->
	<!-- scripts -->
	<?php include("scripts.php"); ?>
</body>
</html>
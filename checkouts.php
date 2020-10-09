<?php include 'head.php'; 
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }
?>

<?php
	include 'track.php';
?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); 
		@$_SESSION['email'] = $sl['demail'];
		@$_SESSION['name'] = $sl['dname'];
		?>
		<!-- site__mobile-header -->
	
		<!-- site__header -->
	
		<!-- site__body -->
		<div class="site__body">
			<div class="block-header block-header--has-breadcrumb block-header--has-title">
				<div class="container">
					<div class="block-header__body">
						<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb__list">
								<li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
								<li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a
										href="index" class="breadcrumb__item-link">Home</a></li>
								<li class="breadcrumb__item breadcrumb__item--parent"><a href="#"
										class="breadcrumb__item-link">Checkout</a></li>
								<!-- <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li> -->
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title">Checkout</h1>
					</div>
				</div>
			</div>
			<div class="checkout block">
				<div class="container container--max--xl">
					<div class="row">
						<div class="col-12 mb-3">
							<div class="alert alert-lg alert-primary">Returning customer? <a href="login">Click here to
									login</a></div>
						</div>
						<div class="col-lg-2"></div>
						<div class="col-12 col-lg-8 col-xl-7 mt-4 mt-lg-0">
							<div class="card mb-0">
								<div class="card-body card-body--padding--2">
									<h3 class="card-title">Your Total Summary </h3>
									<?php //echo $_SESSION['cart-total'];?>
									<table class="checkout__totals">
										<!-- <thead class="checkout__totals-header">
											<tr>
												<th>Product</th>
												<th>Quantity</th>
												<th>Total</th>
											</tr>
										</thead> -->
										<!-- <tbody class="checkout__totals-products bg-dangers" id="checkout">
											
											
										</tbody> -->
										
										<!-- <tfoot class="checkout__totals-footer" style="border-top:1px solid white !important; background:redx"> -->

											<tr  class="bg-primaryd">
												<td style="padding:0 0 10px">Delivery Area </td>
												<td colspan="2" style="padding:10px">
												<select name="location" id="mySelects" class="form-control form-control-sm boxx">
													<option value="">Choose Location</option>
													<option value="Delivery Station">Pick up at our station</option>
													<?php 
													$sk = $conn->query("SELECT * FROM `ddelivery` WHERE status='active' AND dcategory='Delivery Area' ORDER BY dlocation");
													if($sk->num_rows>0):
														while($skk =$sk->fetch_assoc()):
															echo '<option value="'.$skk['dprice'].'">'.$skk['dlocation'].'</option>';
														endwhile;
													endif;
													?>
												</select>
												<div id="station"></div>
													
												</td>
												<!-- <td>
												<div id="station"></div>
												</td> -->
											</tr>

											<tr >
												<th colspan="2" style="padding:0 0 10px">Charges</th>
												<td id="chargex" style="padding:0 0 10px">0.00</td>
											</tr>
											<tr>
												<th colspan="2">Total</th>
												<td id="topup">
												<?php
												if(isset($_SESSION['coupon'])){
													echo number_format($_SESSION['coupon'],2);
												}else{
													echo @number_format($_SESSION['cart-total'],2);
												}
												 ?>
												</td>
											</tr>
										<!-- </tfoot> -->
									</table>
									<div id="page">
									

									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-2"></div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		
<?php include("footer.php"); ?>
	<!-- site__footer / end -->
</div><!-- site / end --><!-- mobile-menu -->
<?php include("mobile-header2.php"); ?>
	
	<!-- mobile-menu / end --><!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div><!-- quickview-modal / end --><!-- add-vehicle-modal -->
	
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div>    
        <div class="pswp__scroll-wrap"><div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button><!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> 
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> 
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
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
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> 
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div><!-- photoswipe / end --><!-- scripts -->
    <?php include("scripts.php"); ?>
 </body>
</html>
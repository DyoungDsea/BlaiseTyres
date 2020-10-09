
<?php include 'head.php'; 
include 'track.php';
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }
?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<?php include("clean.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?><!-- site__header / end -->
		<!-- site__body -->
		<div class="site__body">
			<div class="block-space block-space--layout--after-header"></div>
			<div class="block">
				<div class="container container--max--xl">
					<div class="row">
						<div class="col-12 col-lg-3 d-flex">
							<div class="account-nav flex-grow-1">
								<h4 class="account-nav__title">Navigation</h4>
								<?php include 'link.php'; ?>
							</div>
						</div>
						
						<div class="col-12 col-lg-9 mt-4 mt-lg-0">
							<div class="card">
								<div class="card-header">
									<h5>Shopping cart Details </h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-body card-body--padding--2">
                                <p class="pull-right" style="font-size:14px"><b>Order Id:</b> <?php echo $_SESSION['transid'] ?> &nbsp;&nbsp;&nbsp; <b>Order Date:</b> <?php echo date("d M Y"); ?></p> 
									<div class="row no-gutters">
                                    <?php

                                    $_SESSION['email'] = clean($sl['demail']);
                                    $_SESSION['name'] = clean($sl['dname']);
                                    if(isset($_SESSION["budget"])){
                                    foreach($_SESSION["budget"] as $keys => $values){
                                        // $total_bill = $values['qty'] * $values['price'];
                                           
                                    ?>
										<div class="col-md-4 col-lg-4 col-xl-4 bg-primarys">
											<div class="img bg-dangers" style="width:100%; padding:10px">
                                              <center>  <img style="max-width:45%; margin: 0 auto !important" src="_product_images/<?php echo $values['img'] ?>" alt="">
                                              </center>
                                            </div>
                                            
										</div>

                                        <div class="col-md-8 col-lg-8 col-xl-8 bg-primaryf">
                                            <h5><?php echo $values['name'] ?></h5>
                                            <p><b>vendor code:</b> 	<?php echo $values['vcode'] ?>&nbsp;&nbsp; <span><b>Sku:</b> <?php echo $values['sku'] ?> </span> &nbsp;&nbsp; <br> <span><b>Brand:</b> <?php echo $values['brand'] ?></span> &nbsp;&nbsp;
                                            <b>Unit Price:</b> &#8358;<?php echo number_format($values['price']) ?> &nbsp;&nbsp;
                                            <b>Quantity:</b> <?php echo $values['qty'] ?> <br>
                                            <b>Total:&#8358;</b> <?php echo number_format($values['qty'] * $values['price']) ?>
                                            
                                             </p>
                                            
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                        <?php } ?>
                                        <div class="col-md-7"> 
                                       
                                        <b>Shipping Charges : </b> &#8358;<?php echo number_format($_SESSION['costx']); ?>  <br>
                                            <b>VAT(7.5%): </b>&#8358;  <?php echo number_format($_SESSION['grandx'] * 7.5/100); ?> <br>
                                            <b>Sub Total: </b>&#8358;  <?php echo number_format(($_SESSION['grandx']- $_SESSION['costx'])- ($_SESSION['grandx'] * 7.5/100)); ?> <br>
                                            
                                        <b>Grand Total:</b> &#8358;<?php echo number_format($_SESSION['grandx']); ?> 
                                        
                                        <hr>
                                        <?php if(isset($_SESSION['Address'])){?>
                                            <p><b>Delivery Area:</b> <?php   echo $_SESSION['locationx'];  ?> <br>
                                                <b>Shipping Address: </b> <?php echo $_SESSION['Address']; ?>
                                            </p>
                                        <?php }else{?>
                                            <p><b>Delivery Station:</b> <?php   echo $_SESSION['locationx'];  ?> <br>
                                                <b>Shipping Address: </b> <?php echo $_SESSION['ship_address']; ?>
                                        </p>
                                       <?php } ?>
                                        <hr>
                                        </div>
                                        <div class="col-md-5">
                                        <!-- <hr> -->
                                                                                             
                                            <div class="ml-3">
                                            <p>Use the icon below to make payment</p>
                                        
                                            <form action="cart_pay.php" method="post">                                       
                                            <script src="https://js.paystack.co/v1/inline.js" data-key="pk_test_5914730490c8d7720424e5750edd6cf55533d798" data-email="<?php echo $sl['demail'] ?>" data-amount="<?php echo $_SESSION['grandx'] * 100; ?>" data-ref="<?php echo $transid; ?>"></script>
                                                        
                                            </form>
                                            </div>
                                    <?php } ?>
                                        </div>
									</div>
                                             
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		<!-- site__footer -->
		
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
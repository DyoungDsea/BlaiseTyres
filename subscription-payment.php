
<?php include 'head.php'; 
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
									<h5>Product Details</h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-body card-body--padding--2">
                                <?php

                                    $id = $conn->real_escape_string($_SESSION['userid']);
                                    $subid = $conn->real_escape_string($_GET['transaction_id']);
                                    $_SESSION['subid'] = $subid;
                                    if(!empty($_GET['transaction_id'])):
                                        $poo = $conn->query("SELECT * FROM `dsub` WHERE subid='$subid' AND userid='$id'");
                                        if($poo->num_rows>0):
                                            $row = $poo->fetch_assoc();
                                            $_SESSION['total'] = $row['per_month'];
                                            $_SESSION['pname'] = $row['pname'];
                                            $_SESSION['orderid'] = $row['subid'];
                                    ?>
									<div class="row no-gutters">
                                    
										<div class="col-12 col-lg-7 col-xl-6 bg-primarys">
											<div class="img bg-dangers" style="width:100%; padding:10px">
                                              <center>  <img style="max-width:50%; margin: 0 auto !important" src="_product_images/<?php echo $row['dimg'] ?>" alt="">
                                              </center>
                                            </div>
                                            <div class="deatils text-center">
                                            <h5><?php echo $row['pname'] ?></h5>
                                            <p>
                                            <!-- <b>vendor code:</b> 	<?php //echo $row['dvcode'] ?><br>  -->
                                            <span><b>Sku:</b> <?php echo $row['dsku'] ?> </span> <br> 
                                            <span><b>Brand:</b> <?php echo $row['dbrand'] ?></span> </p>
                                           <p>
                                           
                                        <b>Shipping Charges : </b> &#8358;<?php echo number_format($row['dcharge']*$row['dqty']); ?>  <br>
                                            <b>VAT(7.5%): </b>&#8358;  <?php echo number_format($row['dtotal'] * 7.5/100); ?> <br>
                                            <b>Sub Total: </b>&#8358;  <?php echo number_format(($row['dtotal']- ($row['dcharge']*$row['dqty']))- ($row['dtotal'] * 7.5/100)); ?> <br>
                                            
                                        <b>Grand Total:</b> &#8358;<?php echo number_format($row['dtotal']); ?> 
                                        
                                           </p>
                                            
                                            </div>
										</div>

                                        <div class="col-12 col-lg-3 col-xl-6 bg-primaryf">
                                        <hr style="margin-top:-10px">
                                            <p style="font-size:14px"> <b>Order Id:</b> <?php echo $row['subid'] ?> &nbsp;&nbsp;&nbsp; <b>Order Date:</b> <?php echo date("d M Y", strtotime($row['created_date'])); ?></p>
                                            <hr>
                                            <p><b>Unit Price:</b> &#8358;<?php echo number_format($row['dprice']) ?> &nbsp;&nbsp;<b>Delivery Charges:</b> &#8358;<?php echo number_format($row['dcharge']) ?> <br>
                                            <b>Product Quantity:</b> <?php echo $row['dqty'] ?> &nbsp;&nbsp;<b>Payment Duration:</b> <?php echo $row['dduration'] ?>months <br>
                                            <b>Monthly Payment:</b> &#8358;<?php echo number_format($row['per_month']) ?> &nbsp;&nbsp; <b>Grand Total:</b> &#8358;<?php echo number_format($row['dtotal']) ?>
                                             </p>
                                             <hr>
                                             <b>Amount Paid:</b>  &#8358;<?php if($row['amt_paid'] > $row['dtotal']){ echo number_format($row['dtotal']);
                                            }else{ echo number_format($row['amt_paid'],2,'.',','); } ?>  &nbsp; &nbsp;<b>Status:</b> <?php echo ucfirst($row['pstatus']) ?>&nbsp;&nbsp;
                                            <b>Transaction Status: </b><?php echo ucfirst($row['dtrans_status']) ?> <br>

                                            <?php
                                            if($row['pstatus']=='delivered'){
                                            $user = $_SESSION['userid'];
                                            $pro = $row['pid'];
                                            $xop = $conn->query("SELECT * FROM drating WHERE duserid='$user' AND dpid='$pro' ");
                                            if($xop->num_rows==0):?>
                                             <a href="review-product?product_id=<?php echo $row['pid'] ?>&orderid=<?php echo $_GET['transaction_id']; ?>&date=<?php echo date("d M Y", strtotime($row['created_date'])); ?>&sub=sub" class="btn btn-sm btn-primary">Review</a>
                                            <?php endif; } ?>
                                            <hr>
                                                <p>
                                                <?php if($row['daddress'] !=''){?>
                                                    <b>Delivery Area:</b> <?php echo $row['dlocation'] ?> <br>
                                                    <b>Address:</b> <?php echo $row['daddress'] ?>
                                               <?php }else{ ?>
                                                <b>Delivery Station:</b> <?php echo $row['dlocation'] ?> <br>
                                               <?php } ?>
                                               </p>
                                             <hr>
                                             <?php if($row['dtrans_status'] =="completed" || $row['dtrans_status'] =="cancelled"){ 
                                                 if($row['dtrans_status'] =="completed"){?>
                                                    <h4 class="text-success"> Your subscription is <?php echo $row['dtrans_status'] ?> &#10004;</h4>
                                                <?php }else{?>
                                                <h4 class="text-danger"> Your subscription is <?php echo $row['dtrans_status'] ?> &#128473;</h4>

                                             <?php }  }else{
                                                 if($row['pstatus']=='inactive'){?>
                                                 <p class="text-danger">
                                                    Thank you for subscribing for this product, Your subscription is pending for approval by the Admin blaisetyres.com. You will receive an email once your subscription has been approved or declined
                                                 </p>

                                                <?php }elseif($row['pstatus']=='declined'){?>
                                                    <p class="text-danger">
                                                    Your subscription has been declined,  we are sorry for inconvinences this may cause you.
                                                 </p>
                                                <?php }else{
                                                 ?>
                                                
                                                <p>Use the icon below to make payment</p>
                                             
                                                <form action="sub_pay.php" method="post">                                       
                                                <script src="https://js.paystack.co/v1/inline.js" data-key="pk_live_92d0dd9805b508c3ca3d459fff5ee5c8cd74fce7" data-email="<?php echo $sl['demail'] ?>" data-amount="<?php echo $row['per_month'] * 100; ?>" data-ref="<?php echo $transid; ?>"></script>
                                                            
                                                </form>
                                           <?php } }  ?>
                                        </div>
									</div>
                                        <?php endif; endif; ?>
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
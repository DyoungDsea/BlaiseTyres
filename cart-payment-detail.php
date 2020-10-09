
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
									<h5>Direct Purchases Details </h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-body card-body--padding--2">
                                <p class="pull-right" style="font-size:14px"><b>Order Id:</b> <?php echo $_GET['orderid'] ?> &nbsp;&nbsp;&nbsp; <b>Order Date:</b> <?php echo $_GET['date'] ?></p> 
									<div class="row no-gutters">
                                    <?php

                                    $_SESSION['orderid'] = clean( $_GET['orderid']);
                                    $_SESSION['email'] = clean($sl['demail']);
                                    $_SESSION['name'] = clean($sl['dname']);
                                    if(isset($_GET['orderid'])){
                                    $order = clean($_GET['orderid']);
                                    $idx = clean($_SESSION['userid']);
                                    $sql = $conn->query("SELECT * FROM dcart INNER JOIN dcart_holder ON dcart.orderid=dcart_holder.orderid WHERE dcart.userid='$idx' AND dcart.orderid='$order'");
                                    if($sql->num_rows>0){
                                        $ppname ='';
                                        while($row=$sql->fetch_assoc()):
                                           $total_bill = $row['dtotal_bill'];
                                           $charges = $row['dcharges'];
                                           $payment = $row['payment_status'];
                                           $transaction = $row['dstatus'];
                                           $status = $row['dstatus'];
                                           $ppname .= $row['pname'].' & ';
                                           $location = $row['dlocation'];
                                           $address = $row['daddess'];
                                           
                                    ?>
										<div class="col-md-4 col-lg-4 col-xl-4 bg-primarys">
											<div class="img bg-dangers" style="width:100%; padding:10px">
                                              <center>  <img style="max-width:45%; margin: 0 auto !important" src="_product_images/<?php echo $row['dimg'] ?>" alt="">
                                              </center>
                                            </div>
                                            
										</div>

                                        <div class="col-md-8 col-lg-8 col-xl-8 bg-primaryf">
                                            <h5><?php echo $row['pname'] ?></h5>
                                            <!-- <p><b>vendor code:</b> 	<?php //echo $row['dvcode'] ?>&nbsp;&nbsp; <span> -->
                                            <b>Sku:</b> <?php echo $row['dsku'] ?> </span> &nbsp;&nbsp; <span><b>Brand:</b> <?php echo $row['dbrand'] ?></span> &nbsp;&nbsp;
                                            <b>Unit Price:</b> &#8358;<?php echo number_format($row['dprice']) ?> <br>
                                            <b>Quantity:</b> <?php echo $row['dqty'] ?> &nbsp;&nbsp; 
                                            <b>Total:&#8358;</b> <?php echo number_format($row['dtotal']) ?>
                                            
                                             </p>
                                            <?php
                                            if($transaction=='delivered'){                                            $user = $_SESSION['userid'];
                                            $pro = $row['dpid'];
                                            $xop = $conn->query("SELECT * FROM drating WHERE duserid='$user' AND dpid='$pro' ");
                                            if($xop->num_rows==0):?>
                                             <a href="review-product?product_id=<?php echo $row['dpid'] ?>&orderid=<?php echo $order; ?>&date=<?php echo $_GET['date'] ?>" class="btn btn-sm btn-primary">Review</a>
                                            <?php endif; }?>
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                        <?php endwhile;  } $_SESSION['total-bill'] = $total_bill; $_SESSION['ppname'] = $ppname; ?>
                                        <?php if($payment != 'paid' AND $transaction=='pending'){ ?>
                                        <div class="col-md-7"> 
                                            <b>Shipping Charges : </b> &#8358;<?php echo number_format($charges); ?>  <br>
                                            <b>VAT(7.5%): </b>&#8358;  <?php echo number_format($total_bill * 7.5/100); ?> <br>
                                            <b>Sub Total: </b>&#8358;  <?php echo number_format(($total_bill-$charges)- ($total_bill * 7.5/100)); ?> <br>
                                            <b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>
                                            <hr>
                                            <?php if($address !=''){?>
                                            <p><b>Delivery Area:</b> <?php   echo $location;  ?> <br>
                                                <b>Address: </b> <?php echo $address; ?>
                                            </p>
                                                <?php }else{?>
                                                    <p><b>Delivery Station:</b> <?php echo $location;  ?> 
                                                </p>
                                            <?php } ?>
                                                <!-- <p><b>Delivery Area/Station:</b> <?php //echo $location ?></p> -->
                                             <hr>
                                        </div>
                                        <div class="col-md-5">
                                        <!-- <hr> -->
                                            
                                            <div class="ml-3">
                                            <p>Use the icon below to make payment</p>
                                        
                                            <form action="cart_pay-up.php" method="post">                                       
                                            <script src="https://js.paystack.co/v1/inline.js" data-key="pk_live_92d0dd9805b508c3ca3d459fff5ee5c8cd74fce7" data-email="<?php echo $sl['demail'] ?>" data-amount="<?php echo $total_bill * 100; ?>" data-ref="<?php echo $transid; ?>"></script>
                                                        
                                            </form>
                                            </div>
                                    
                                        </div>
                                        <?php }else{?>

                                            <div class="col-md-7">
                                            <p>
                                                <b>Total Charges : </b> &#8358;<?php echo number_format($charges); ?>  <br>
                                                <b>Grand Total: </b>&#8358;  <?php echo number_format($total_bill); ?>  
                                            </p>

                                            </div>
                                            <div class="col-md-5">
                                                <?php if($transaction=='returned' || $transaction=='cancelled' ){?>
                                                <b>Transaction Status: </b>  <?php echo ucfirst($status); ?> 
                                                <?php }else{?>
                                                <p>
                                                <b>Payment Status:  </b> <?php echo ucfirst($payment); ?> <span class="text-success" style="font-size:20px"> &#10004;</span><br>
                                                <b>Transaction Status: </b>  <?php echo ucfirst($status); ?> 
                                                </p>
                                                <?php }?>
                                            
                                            </div>

                                     <?php   } 
                                } ?>
                                <?php if($payment =='pending' AND $status =='pending' ):?>
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-secondary" btn="<?php echo $_GET['orderid']; ?>" id="remover">Remove</button>
                                    <?php if($payment !='cancelled' AND $status !='cancelled' ):?>
                                    <button class="btn btn-sm btn-secondary" btn="<?php echo $_GET['orderid']; ?>" id="cancelr">Cancel</button>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
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


    <script>
    $(document).ready(function(){


        $(document).on('click', '#remover', function(){
            // e.preventDefault(); 
            var btnDelete =  $(this).attr("btn");
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Remove for me?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
                }).then((result) => {
                if (result.value){
                    $.ajax({
                        url:"account-shipping.php",
                        method:"POST",
                        data:{Remover:1, id:btnDelete},
                        success:function(data){
                            setInterval(() => {
                                window.location.assign("account-direct-purchases");
                            }, 2000);
                            
                        }
                    })
                    .done(function(response){
                        Swal.fire({
                            type:'success', 
                            title:'Removed'
                        });
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }

            });
                    
        });


        $(document).on('click', '#cancelr', function(){
            // e.preventDefault(); 
            var btnDefault =  $(this).attr("btn");
            // alert(btnDefault);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Cancel for me?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
                }).then((result) => {
                if (result.value){
                    $.ajax({
                        url:"account-shipping.php",
                        method:"POST",
                        data:{Cancelr:1, id:btnDefault},
                        success:function(data){
                            setInterval(() => {
                                window.location.assign("account-direct-purchases");
                            }, 2000);
                            
                        }
                    })
                    .done(function(response){
                        Swal.fire({
                            type:'success', 
                            title:'Cancelled'
                        });
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }

            });
                    
        });


    })



    </script>
 </body>
</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/account-profile by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:12:30 GMT -->




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
									<h5>Shipping Address</h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-body card-body--padding--2">
									<div class="row no-gutters">
										
                                        <div class="col-12 col-lg-6 col-xl-6">
                                        <?php 
                                        $users = $conn->real_escape_string($_SESSION['userid']);
                                        $kip = $conn->query("SELECT * FROM dship_address WHERE userid='$users' ORDER BY dstatus='yes' DESC");
                                        if($kip->num_rows>0){
                                            $num = 1;
                                            while($rop=$kip->fetch_assoc()){?>
                                            <p> <span class="numbers"><?php echo $num++; ?></span>
                                                <?php echo $rop['daddress']; ?>

                                                <?php if($rop['dstatus']=='yes'){?>
                                                <div class="address-card__badge tag-badge tag-badge--theme" style="top:-20px">Default</div>
                                                <?php } ?>
                                            </p>
                                            <p> 
                                                <?php if($rop['dstatus'] !='yes'){?>
                                                <button class="btn btn-sm btn-secondary" id="btnDelete" btn="<?php echo $rop['dship_id']; ?>" title="Delete for me"> <i class="fas fa-trash"></i> </button>
                                                <button class="btn btn-sm btn-secondary" id="btnDefault" btn="<?php echo $rop['dship_id']; ?>" title="Delete for me"> Set as Default </button>
                                                <?php } ?>
                                            </p>
                                            <hr>

                                        <?php } }  ?>
                                        </div>

                                        <div class="col-12 col-lg-6 col-xl-6">
                                        <div class="newpage ml-5">
                                            <button id="shippinged" class=" btn btn-secondary">Add new shipping address  <i class="fas fa-edit text-primary"></i> </button>
                                        </div>
											<div class="ship ml-4" id="ship">
                                                <form action="account-shipping-process" method="POST">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="shipping" id="" rows="3" placeholder="No 4 Toyin Street Ikeja, Lagos" required class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                <button type="submit" name="log" class="btn btn-primary ml-3">Save</button>
                                                </div>
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
        var ship = $("#ship");
        $(document).on("click","#shippinged", function(){
            ship.toggle();
        } );


        $(document).on('click', '#btnDelete', function(){
            // e.preventDefault(); 
            var btnDelete =  $(this).attr("btn");
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Delete for me?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
                }).then((result) => {
                if (result.value){
                    $.ajax({
                        url:"account-shipping.php",
                        method:"POST",
                        data:{Delete:1, id:btnDelete},
                        success:function(data){
                            setInterval(() => {
                                window.location.assign("account-shipping-address");
                            }, 2000);
                            
                        }
                    })
                    .done(function(response){
                        Swal.fire({
                            type:'success', 
                            title:'Deleted'
                        });
                    })
                    .fail(function(){
                        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                    });
                }

            });
                    
        });


        $(document).on('click', '#btnDefault', function(){
            // e.preventDefault(); 
            var btnDefault =  $(this).attr("btn");
            // alert(btnDefault);
            Swal.fire({
                position: 'center',
                type: 'warning',
                title: 'Set as default for me?',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
                
                }).then((result) => {
                if (result.value){
                    $.ajax({
                        url:"account-shipping.php",
                        method:"POST",
                        data:{Default:1, id:btnDefault},
                        success:function(data){
                            setInterval(() => {
                                window.location.assign("account-shipping-address");
                            }, 2000);
                            
                        }
                    })
                    .done(function(response){
                        Swal.fire({
                            type:'success', 
                            title:'Confirmed'
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
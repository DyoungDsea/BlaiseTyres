<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/account-password by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:12:30 GMT -->


<?php include 'head.php';

if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
	header("location: login");
}

?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
		<!-- site__mobile-header -->
	
		<!-- site__header -->
	
		
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
									<h5>Change Password</h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-body card-body--padding--2">
									<div class="row no-gutters">
										<div class="col-12 col-lg-7 col-xl-6">
											<form method="POST" action="account-password-process" > 
											<div class="form-group">
												<label for="password-current">Current Password</label> 
												<input type="password" name="opass" required class="form-control" id="password-current" placeholder="Current Password">
											</div>
											<div class="form-group">
												<label for="password-new">New Password</label>
												<input type="password" name="pass" required class="form-control" id="password-new" placeholder="New Password">
											</div>
											<div class="form-group">
												<label for="password-confirm">Reenter New Password</label> 
												<input type="password" name="cpass" required class="form-control" id="password-confirm" placeholder="Reenter New Password">
											</div>
											<div class="form-group mb-0">
												<button class="btn btn-primary mt-3" name="log" type="submit">Change</button>
											</div>
										</form>
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
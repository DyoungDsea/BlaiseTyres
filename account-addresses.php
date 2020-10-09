
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
							<div class="addresses-list"><a href="#"
									class="addresses-list__item addresses-list__item--new">
									<div class="addresses-list__plus"></div>
									<div class="btn btn-secondary btn-sm">Add New</div>
								</a>
								<div class="addresses-list__divider"></div>
								<div class="addresses-list__item card address-card">
									<div class="address-card__badge tag-badge tag-badge--theme">Default</div>
									<div class="address-card__body">
										<div class="address-card__name">Helena Garcia</div>
										<div class="address-card__row">Random Federation<br>115302, Moscow<br>ul.
											Varshavskaya, 15-2-178</div>
										<div class="address-card__row">
											<div class="address-card__row-title">Phone Number</div>
											<div class="address-card__row-content">38 972 588-42-36</div>
										</div>
										<div class="address-card__row">
											<div class="address-card__row-title">Email Address</div>
											<div class="address-card__row-content">helena@example.com</div>
										</div>
										<div class="address-card__footer"><a href="#">Edit</a>&nbsp;&nbsp; <a
												href="#">Remove</a></div>
									</div>
								</div>
								<div class="addresses-list__divider"></div>
								<div class="addresses-list__item card address-card">
									<div class="address-card__body">
										<div class="address-card__name">Jupiter Saturnov</div>
										<div class="address-card__row">RandomLand<br>4b4f53, MarsGrad<br>Sun Orbit,
											43.3241-85.239</div>
										<div class="address-card__row">
											<div class="address-card__row-title">Phone Number</div>
											<div class="address-card__row-content">ZX 971 972-57-26</div>
										</div>
										<div class="address-card__row">
											<div class="address-card__row-title">Email Address</div>
											<div class="address-card__row-content">jupiter@example.com</div>
										</div>
										<div class="address-card__footer"><a href="#">Edit</a>&nbsp;&nbsp; <a
												href="#">Remove</a></div>
									</div>
								</div>
								<div class="addresses-list__divider"></div>
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
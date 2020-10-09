
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
									<h5>Write A Review  </h5>
								</div>
								<div class="card-divider"></div>
								    <div class="card-body card-body--padding--2">
                                
                                    <form class="reviews-view__form" action="review-process" method="POST">
                                        <!-- <h3 class="reviews-view__header"></h3> -->
                                        <div class="row">
                                            <div class="col-xxl-8 col-xl-10 col-lg-9 col-12">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="review-stars">Review Stars</label> 
                                                        <select id="review-stars" name="star" required class="form-control">
                                                            <option value="5">5 Stars Rating</option>
                                                            <option value="4">4 Stars Rating</option>
                                                            <option value="3">3 Stars Rating</option>
                                                            <option value="2">2 Stars Rating</option>
                                                            <option value="1">1 Stars Rating</option>
                                                        </select>
                                                        <input type="hidden" name="pid" value="<?php echo $_GET['product_id']; ?>">
                                                        <input type="hidden" name="oid" value="<?php echo $_GET['orderid']; ?>">
                                                        <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>">
                                                        <input type="hidden" name="name" value="<?php echo $sl['dname']; ?>">
                                                        <?php if(isset($_GET['sub'])){?>
                                                        <input type="hidden" name="sub" value="<?php echo $_GET['sub']; ?>">
                                                        <?php } ?>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="review-author">Your Name</label> 
                                                        <input type="text" class="form-control" disabled value="<?php echo $sl['dname']; ?>" id="review-author" placeholder="Your Name">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="review-text">Your Review</label> 
                                                    <textarea class="form-control" name="text" required id="review-text" rows="6"></textarea>
                                                </div>
                                                <div class="form-group mb-0 mt-4">
                                                    <button type="submit" name="review" class="btn btn-primary">Post Your Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>



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

<?php include("head.php");


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
						<h1 class="post-header__title dodo">Track Order [-<?php if(isset($trid)){echo $trid; }  ?>-]</h1>
					</div>
				</div>
				<div class="container">
					<div class="post-view__body">
						<div class="post-view__item post-view__item-post">
							<div class="post-view__card post">
								<div class="post__body typography">
								<h1 class="card-title card-title--lg">Track Order</h1>
									<p class="mb-4">Enter the order ID that was used to create the transaction, and then click the track button.</p>
									<form action="track-result" method="post">
										<div class="form-group">
                                            <label for="track-order-id">Order ID</label>
                                 <input type="text" name="trid" value="<?php if(isset($trid)){echo $trid; }  ?>" class="form-control" placeholder="Enter Order ID here..." required>
                                </div>
									
										<div class="form-group pt-4 mb-1">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Track</button>
                                        </div>
									</form>
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
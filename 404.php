<?php 
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 


include("conn.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<?php include("head.php"); ?>

<body>
	<!-- site -->
	<div class="site">
			<?php include("mobile-header.php"); ?>
			<!-- site__header -->
			<?php include("desktop-header.php"); ?>
			<!-- site__body -->
		<div class="site__body">
			<div class="block-space block-space--layout--spaceship-ledge-height"></div>
			<div class="block">
				<div class="container">
					<div class="not-found">
						<div class="not-found__404 text-primary">Oops! Error 404</div>
						<div class="not-found__content">
							<h1 class="not-found__title text-danger">Page Not Found</h1>
							<p class="not-found__text">We can't seem to find the page you're looking for.<br>Try to use
								the search.</p><a
								class="btn btn-primary btn-md" href="index">Go To Home Page</a>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		<!-- site__footer -->
	

<?php include("block2.php"); ?>


		<?php include("footer.php"); ?>

	</div><!-- mobile-menu / end -->
	<?php include("mobile-header2.php"); ?>
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
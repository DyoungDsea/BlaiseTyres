
<?php include("head.php"); ?>

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
						<h1 class="post-header__title dodo">Our Services</h1>
					</div>
				</div>
				<div class="container">
					<div class="post-view__body">
						<div class="post-view__item post-view__item-post">
							<div class="post-view__card post">
								<div class="post__body typography">
								<!-- <h1 class="document__title dodo" style="margin-bottom:0px!important;">Terms And Conditions</h1>
                                <h2></h2> -->
								<?php $go = $conn->query("SELECT * FROM blaise_set WHERE bid='76718909812231'");								
									$row=$go->fetch_assoc();
									if($row['dimg']!=''){
								?>								
                                <figure><img src="_slide_images/<?php echo $row['dimg']; ?> " alt=""></figure>
									<?php }else{?>
										<figure><img src="images/pic2.jpg" alt=""></figure>
								<?php	} ?>
								<br>
								<?php 
								echo $row['ddesc'];
								 ?>
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
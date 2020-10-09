<?php include 'head.php'; 
// include 'track.php';
    
?>
<body>
	<!-- site -->
	<div class="site">
	<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
		
		<!-- site__body -->
		<div class="site__body">
			<div class="block-header block-header--has-breadcrumb block-header--has-title">
				<div class="container">
					<div class="block-header__body">
						<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb__list">
								<li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
								<li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a
										href="index" class="breadcrumb__item-link">Home</a></li>
								<li class="breadcrumb__item breadcrumb__item--parent"><a href="#"
										class="breadcrumb__item-link">Compare</a></li>
								<!-- <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li> -->
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title">Compare</h1>
					</div>
				</div>
			</div>
			<div class="block">
				<div class="container">
					<div class="compare card">
						<div class="compare__options-list">
							<div class="compare__option">
								<div class="compare__option-label">Show:</div>
								<div class="compare__option-control">
									<div class="button-toggle">
										<div class="button-toggle__list"><label class="button-toggle__item"><input
													type="radio" class="button-toggle__input" name="compare-filter"
													checked="checked"> <span
													class="button-toggle__button">All</span></label> 
													<!-- <label
												class="button-toggle__item">
												<input type="radio" class="button-toggle__input" name="compare-filter"> <span
													class="button-toggle__button">Different</span></label> -->
												</div>
									</div>
								</div>
							</div>
							<div class="compare__option">
								<div class="compare__option-control">
									<button type="button" id="clearCompare" class="btn btn-secondary btn-xs">Clear list</button></div>
							</div>
						</div>

						<div class="wishlist">
						<table class="wishlist__table">
							<thead class="wishlist__head">
								<tr class="wishlist__row wishlist__row--head">
									<th class="wishlist__column wishlist__column--head wishlist__column--image">Image
									</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--product">
										Product</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--stock">Stock
										status</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--price">Price
									</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--sku">SKU
									</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--button"></th>
									<th class="wishlist__column wishlist__column--head wishlist__column--remove"></th>
								</tr>
							</thead>
							<tbody class="wishlist__body" id="compare_details">
								
								 

								
								
							</tbody>
							
						</table>
							
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
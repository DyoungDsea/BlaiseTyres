<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/cart by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:11:54 GMT -->


<?php include("head.php"); include 'track.php'; ?>

<body>
	<!-- site -->
	<div class="site">
        <!-- site__mobile-header -->
        <?php include("mobile-header.php"); ?>
		
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
        
        <!-- site__header / end -->
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
										class="breadcrumb__item-link">Shopping Cart</a></li>
								<!-- <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li> -->
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title">Shopping Cart</h1>
					</div>
				</div>
            </div>
            
			<div class="block">
				<div class="container">
					<div class="cart">
						<div class="cart__table cart-table">
							<table class="cart-table__table">

								<thead class="cart-table__head">
									<tr class="cart-table__row">
										<th class="cart-table__column cart-table__column--image">Image</th>
										<th class="cart-table__column cart-table__column--product">Product</th>
										<th class="cart-table__column cart-table__column--price">Price</th>
										<th class="cart-table__column cart-table__column--quantity">Quantity</th>
										<th class="cart-table__column cart-table__column--total">Total</th>
										<th class="cart-table__column cart-table__column--remove"></th>
									</tr>
                                </thead>
                                
								<tbody class="cart-table__body" id="cart_details">

									<!-- <tr class="cart-table__row">
										<td class="cart-table__column cart-table__column--image"><a href="#"><img
													src="images/products/product-4-160x160.jpg" alt=""></a></td>
										<td class="cart-table__column cart-table__column--product"><a href="#"
												class="cart-table__product-name">Glossy Gray 19" Aluminium Wheel
												AR-19</a>
											<ul class="cart-table__options">
												<li>Color: Yellow</li>
												<li>Material: Aluminium</li>
												<li>Material: Aluminium</li>
											</ul>
										</td>
										<td class="cart-table__column cart-table__column--price" data-title="Price">
											$699.00</td>
										<td class="cart-table__column cart-table__column--quantity"
											data-title="Quantity">
											<div class="cart-table__quantity input-number"><input
													class="form-control input-number__input" type="number" min="1"
													value="2">
												<div class="input-number__add"></div>
												<div class="input-number__sub"></div>
											</div>
										</td>
										<td class="cart-table__column cart-table__column--total" data-title="Total">
											$1398.00</td>
										<td class="cart-table__column cart-table__column--remove">
                                            <button type="button" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                                <svg width="12" height="12">
                                                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                                </svg>
                                            </button></td>
                                    </tr> -->
                                    
                                </tbody>
                                
								
							</table>

							<div class="cart__totals" id="card" >
							
							</div>
							<div class="box" style="margin: 20px 10px;">
								<tfoot class="cart-table__foot" >
									<tr>
										<td colspan="6">
											<div class="cart-table__actions">
												<form class="cart-table__coupon-form form-row">
													<div class="form-group mb-0 col flex-grow-1">
													<input type="text" id="coupon" class="form-control form-control-sm" placeholder="Coupon Code">
													</div>
													<div class="form-group mb-0 col-auto">
														<button type="button" id="btnCoupon" disabled class="btn btn-sm btn-primary">Apply Coupon</button>
													</div>
												</form>
												<div class="cart-table__update-button clearBtnc"  id="clearBtnc">
													
												</div>
											</div>
										</td>
									</tr>
								</tfoot>
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
	</div><!-- site / end -->
	<!-- mobile-menu -->
	
<?php include("mobile-header2.php"); ?>
    
    <!-- mobile-menu / end -->
	<!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div>
	<!-- quickview-modal / end -->
	<!-- add-vehicle-modal -->
	
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
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/cart by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:11:54 GMT -->

</html>
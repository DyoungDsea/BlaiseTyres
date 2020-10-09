<?php include 'head.php'; 
include 'track.php';
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }
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
										href="index-2" class="breadcrumb__item-link">Home</a></li>
								<li class="breadcrumb__item breadcrumb__item--parent"><a href="#"
										class="breadcrumb__item-link">Wishlist</a></li>
								<!-- <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li> -->
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title">Wishlist</h1>
					</div>
				</div>
			</div>
			<div class="block">
				<div class="container container--max--xl">
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
									<th class="wishlist__column wishlist__column--head wishlist__column--button"></th>
									<th class="wishlist__column wishlist__column--head wishlist__column--remove"></th>
								</tr>
							</thead>
							<tbody class="wishlist__body">
								<?php  $userid = $_SESSION['userid'];
								$cop = $conn->query("SELECT * FROM dwishlist INNER JOIN products ON dwishlist.pid=products.dpid WHERE dwishlist.userid='$userid' ORDER BY dwishlist.id DESC");
								if($cop->num_rows>0){
									while($row=$cop->fetch_assoc()): $product = $row['dpid'];
								?>
								<input type="hidden" id="pname<?php echo $row['dpid']; ?>" value="<?php echo $row['dpname']; ?>">
								<input type="hidden" id="brand<?php echo $row['dpid']; ?>" value="<?php echo $row['dbrand']; ?>"> 
								<input type="hidden" id="sku<?php echo $row['dpid']; ?>" value="<?php echo $row['dsku']; ?>">
								<input type="hidden" id="vcode<?php echo $row['dpid']; ?>" value="<?php echo $row['dvcode']; ?>">
								<input type="hidden" id="img<?php echo $row['dpid']; ?>" value="<?php echo $row['dimg1']; ?>">
								<input type="hidden" id="quantity<?php echo $row['dpid']; ?>" value="1">
								<input id="fullPayment<?php echo $row['dpid']; ?>" value="<?php echo discount($row['ddiscount'], $row['dprice']); ?>" type="hidden"> 

								<tr class="wishlist__row wishlist__row--body">
									<td class="wishlist__column wishlist__column--body wishlist__column--image setimage"><a
											href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"><img src="_product_images/<?php echo $row['dimg1']; ?>" alt=""></a></td>
									<td class="wishlist__column wishlist__column--body wishlist__column--product">
										<div class="wishlist__product-name"><a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"><?php echo $row['dpname']; ?></a></div>
										<div class="wishlist__product-rating">
											<div class="wishlist__product-rating-stars">
												<div class="rating">
													<div class="rating__body">
													<?php echo starRating($product); ?>
													</div>
												</div>
											</div>
											<div class="wishlist__product-rating-title"><?php echo starReview($product) ?></div>
										</div>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--stock">
										<div class="status-badge status-badge--style--success status-badge--has-text">
											<div class="status-badge__body">
												<div class="status-badge__text"><?php echo $row['davaliable']; ?></div>
											</div>
										</div>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--price">&#8358;<?php echo number_format(discount($row['ddiscount'], $row['dprice'])); ?>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--button">
										<button pid="<?php echo $row['dpid']; ?>" type="button" id="addToCarts" class="btn btn-sm btn-primary">Add to cart</button></td>
									<td class="wishlist__column wishlist__column--body wishlist__column--remove"><button pid="<?php echo $row['dpid']; ?>" id="pot"
											type="button" class="wishlist__remove btn btn-sm btn-muted btn-icon"><svg
												width="12" height="12">
												<path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z" /></svg></button></td>
								</tr>
									<?php endwhile; }else{
										echo "<tr><td colspan='8'>No result found</td></tr>";
									}
									?>
							</tbody>
						</table>
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
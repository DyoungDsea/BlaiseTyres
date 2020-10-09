

			<?php include 'clean.php'; ?>
			<?php include 'pagination_function.php'; ?>


<?php include 'head.php' ?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
		<!-- site__body -->
		


		<?php
		
				//New pagination

				$queryString = "?";

				if (isset($_GET["page"])) {
					$pn = $_GET["page"];
				} else {
					$pn = 1;
				}
				$limit = 32;

			?>


<div class="site__body"><div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container"><div class="block-header__body"><nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb"><ol class="breadcrumb__list"><li class="breadcrumb__spaceship-safe-area" role="presentation"></li><li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="index.html" class="breadcrumb__item-link">Home</a></li>
<!-- <li class="breadcrumb__item breadcrumb__item--parent"><a href="#" class="breadcrumb__item-link">Breadcrumb</a></li> -->
<li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Shop List</span></li><li class="breadcrumb__title-safe-area" role="presentation"></li></ol></nav>

<h1 class="block-header__title">

<?php
			if(isset($_GET["categoryc"])){
				$category = $_GET["categoryc"];
				echo "$category ";

			}elseif(isset($_GET["search"])){
				echo "Tyres and Tubes";

			}elseif(isset($_GET['categoryt']) AND isset($_GET['budget'])){
				$category = $_GET["categoryt"];
				$budget = $_GET["budget"];
				echo "$category ($budget)";

			}elseif(isset($_GET['min-price']) AND isset($_GET['max-price'])){
				$min = $_GET["min-price"];
				$max = $_GET["max-price"];
				echo "Search By Price Between ($min &amp; $max)";

			}elseif(isset($_GET['categorybr']) AND isset($_GET['brand'])){
				$category = $_GET["categorybr"];
				$brand = $_GET["brand"];
				echo "$category ($brand)";

			}elseif(isset($_GET['dcat']) AND isset($_GET['subcat'])){
				echo 'Shop List('.$_GET['dcat'].' =>'.$_GET['subcat'].')';

			}elseif(isset($_GET['width']) AND isset($_GET['profile']) AND isset($_GET['rim'])  ){
				echo 'Tyres';

			}elseif(isset($_GET['model']) AND isset($_GET['year']) AND isset($_GET['make'])){
				echo 'Tyres';

			}elseif(isset($_GET['budgett']) AND isset($_GET['widtht'])  AND isset($_GET['profilet']) AND isset($_GET['rimt'])  ){
				echo 'Shop List(Budget)';
			}
			else{
			 echo 'Shop List';
			}


			?>




</h1>



</div></div></div>
<div class="block-split block-split--has-sidebar"><div class="container"><div class="block-split__row row no-gutters"><div class="block-split__item block-split__item-sidebar col-auto">
	<div class="sidebar sidebar--offcanvas--mobile">
		<div class="sidebar__backdrop"></div>
		<div class="sidebar__body"><div class="sidebar__header">
			<div class="sidebar__title">Filters</div>
			<button class="sidebar__close" type="button"><svg width="12" height="12"><path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"/></svg></button></div>
	
	<div class="sidebar__content">
		
	<div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened"><div class="widget__header widget-filters__header">
		<h4>Filters</h4></div><div class="widget-filters__list"><div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title" data-collapse-trigger>Categories <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button><div class="filter__body" data-collapse-content><div class="filter__container">
			<div class="filter-categories">
			<ul class="filter-categories__list">
				<?php 
				$cate = $conn->query("SELECT * from categories where status='active' ORDER BY name");
				if($cate->num_rows > 0){
					while($cat=$cate->fetch_assoc()):
					$dcate= $cat['name']; ?>
				<li class="filter-categories__item filter-categories__item--parent">
					<span class="filter-categories__arrow">
						<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
						</svg> 
					</span>
					<a href="shop-list?categoryc=<?php echo $cat['name'] ?>" style="text-transform: uppercase !important;"><?php echo $cat['name'] ?></a>
					<div class="filter-categories__counter">
						<?php $sp = $conn->query("SELECT * FROM products WHERE dcategory='$dcate'");
						echo $sp->num_rows;?>
					</div>
				</li>
					<?php endwhile; } ?>
			
			</ul>

			</div>
</div>
</div>
</div>
</div>
	
	<div class="widget-filters__item">
	<div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title" data-collapse-trigger>Budget <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button><div class="filter__body" data-collapse-content>
		<div class="filter__container">
			<div class="filter-vehicle">
				
				<div class="filter-categories">
					<ul class="filter-categories__list">
						
						<li class="filter-categories__item filter-categories__item--parent">
							<span class="filter-categories__arrow">
								<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
								</svg> 
							</span>
							<a href="shop-list?categoryt=Tyres and Tubes&budget=Budget">Budget</a>
							<div class="filter-categories__counter">
								<?php $sp = $conn->query("SELECT * FROM products WHERE  dbudget='Budget'");
								echo $sp->num_rows;?>
							</div>
						</li>

						<li class="filter-categories__item filter-categories__item--parent">
							<span class="filter-categories__arrow">
								<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
								</svg> 
							</span>
							<a href="shop-list?categoryt=Tyres and Tubes &budget=Economy">Economy</a>
							<div class="filter-categories__counter">
								<?php $sp = $conn->query("SELECT * FROM products WHERE  dbudget='Economy'");
								echo $sp->num_rows;?>
							</div>
						</li>


						<li class="filter-categories__item filter-categories__item--parent">
							<span class="filter-categories__arrow">
								<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
								</svg> 
							</span>
							<a href="shop-list?categoryt=Tyres and Tubes &budget=Premium">Premium</a>
							<div class="filter-categories__counter">
								<?php $sp = $conn->query("SELECT * FROM products WHERE  dbudget='Premium'");
								echo $sp->num_rows;?>
							</div>
						</li>

						<li class="filter-categories__item filter-categories__item--parent">
							<span class="filter-categories__arrow">
								<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
								</svg> 
							</span>
							<a href="shop-list?categoryt=Tyres and Tubes &budget=Quality">Quality</a>
							<div class="filter-categories__counter">
								<?php $sp = $conn->query("SELECT * FROM products WHERE  dbudget='Quality'");
								echo $sp->num_rows;?>
							</div>
						</li>
					
					</ul>

					</div>

					<div class="filter-vehicle__button">
						<!-- <button type="button" class="btn btn-xs btn-secondary">Add Vehicle</button> -->
</div>
</div>

</div>

</div></div></div>
	
	<div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title" data-collapse-trigger>Price <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button>
	<div class="filter__body" data-collapse-content>
		<div class="filter__container">
			<div class="filter-price" id="hope" data-min="1000" data-max="250000" data-from="1000" data-to="40000">
				<div class="filter-price__slider"></div>
				<div class="filter-price__title-button">
					<div class="filter-price__title">
						&#8358;<span class="filter-price__min-value"></span> – 
						&#8358;<span class="filter-price__max-value"></span>
					</div>
					<button type="button" id="filter" class="btn btn-xs btn-secondary filter-price__button">Filter</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	

	
	<div class="widget-filters__item">
		<div class="filter filter--opened" data-collapse-item>
			<button type="button" class="filter__title" data-collapse-trigger>Brand <span class="filter__arrow"><svg width="12px" height="7px">
				<path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span>
			</button>
			<div class="filter__body" data-collapse-content>
				<div class="filter__container">
					<div class="filter-list"
					><div class="filter-list__list">

					<div class="filter-categories">
					<ul class="filter-categories__list">
						<?php 
						$cate = $conn->query("SELECT * from `brands` where status='active' ORDER BY name LIMIT 10");
						if($cate->num_rows > 0){
							while($cat=$cate->fetch_assoc()):
							$dcate= $cat['dcategory'];
							$brand= $cat['name'];
							 ?>
						<li class="filter-categories__item filter-categories__item--parent">
							<span class="filter-categories__arrow">
								<svg width="6" height="9"><path d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9	C6.1,7.8,6.1,8.4,5.7,8.7z"/>
								</svg> 
							</span>
							<a href="shop-list?categorybr=<?php echo $cat['dcategory'] ?>&brand=<?php echo $cat['name'] ?>">
							<?php echo $cat['name'] ?></a>
							<div class="filter-categories__counter">
								<?php $sp = $conn->query("SELECT * FROM products WHERE dcategory='$dcate' AND dbrand='$brand'");
								echo $sp->num_rows;?>
							</div>
						</li>
							<?php endwhile; } ?>
					
					</ul>

					</div>
					
	 
	 </div></div></div></div></div></div>
	
	
	<!-- <div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item><button type="button" class="filter__title" data-collapse-trigger>Rating <span class="filter__arrow"><svg width="12px" height="7px"><path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/></svg></span></button><div class="filter__body" data-collapse-content><div class="filter__container"><div class="filter-rating"><ul class="filter-rating__list"><li class="filter-rating__item"><label class="filter-rating__item-label"><span class="input-check filter-rating__item-input"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><span class="filter-rating__item-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div></div></div></span><span class="filter-rating__item-title sr-only">5 stars </span><span class="filter-rating__item-counter">42</span></label></li><li class="filter-rating__item"><label class="filter-rating__item-label"><span class="input-check filter-rating__item-input"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><span class="filter-rating__item-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div></div></div></span><span class="filter-rating__item-title sr-only">4 stars </span><span class="filter-rating__item-counter">24</span></label></li><li class="filter-rating__item"><label class="filter-rating__item-label"><span class="input-check filter-rating__item-input"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><span class="filter-rating__item-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div><div class="rating__star"></div></div></div></span><span class="filter-rating__item-title sr-only">3 stars </span><span class="filter-rating__item-counter">19</span></label></li><li class="filter-rating__item"><label class="filter-rating__item-label"><span class="input-check filter-rating__item-input"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><span class="filter-rating__item-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star rating__star--active"></div><div class="rating__star"></div><div class="rating__star"></div><div class="rating__star"></div></div></div></span><span class="filter-rating__item-title sr-only">2 stars </span><span class="filter-rating__item-counter">3</span></label></li><li class="filter-rating__item"><label class="filter-rating__item-label"><span class="input-check filter-rating__item-input"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><span class="filter-rating__item-stars"><div class="rating"><div class="rating__body"><div class="rating__star rating__star--active"></div><div class="rating__star"></div><div class="rating__star"></div><div class="rating__star"></div><div class="rating__star"></div></div></div></span><span class="filter-rating__item-title sr-only">1 star </span><span class="filter-rating__item-counter">12</span></label></li></ul></div></div></div></div></div> -->
	
	</div></div>
	
	<div class="card widget widget-products d-none d-lg-block">
		<div class="widget__header"><h4>Latest Products</h4></div>	
	<div class="widget-products__list">
	<?php 

			

			$sql = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 20");
			
            if($sql->num_rows>0):
				while($row=$sql->fetch_assoc()): ?>
		<div class="widget-products__item">
			<div class="widget-products__image" style="max-width:40%">
				<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
				<!-- <img src="images/products/product-1-64x64.jpg" alt=""> -->
				<img style="width:100%" src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
				</a>
			</div>
			<div class="widget-products__info">
				<div class="widget-products__name"><a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"><?php echo $row['dpname']; ?></a></div>
				<div class="widget-products__prices">
					<div class="widget-products__price widget-products__price--current">&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?></div>
				</div>
			</div>
		</div>
				<?php endwhile; endif; ?>
		</div>
	</div>
</div>
</div>
</div>
</div>

<div class="block-split__item block-split__item-content col-auto">
	<div class="block">
		<div class="products-view">
			<div class="products-view__options view-options view-options--offcanvas--mobile">
				<div class="view-options__body">
					<button type="button" class="view-options__filters-button filters-button"><span class="filters-button__icon"><svg width="16" height="16"><path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2
	C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2
	C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3
	C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"/></svg> </span><span class="filters-button__title">Filters</span> <span class="filters-button__counter">4</span></button><div class="view-options__layout layout-switcher"><div class="layout-switcher__list"><button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="false"><svg width="16" height="16"><path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8
	C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8
	C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z"/></svg></button> <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true"><svg width="16" height="16"><path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8
	v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z"/></svg></button> <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="list" data-with-features="false"><svg width="16" height="16"><path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7
	H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z"/></svg></button> <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false"><svg width="16" height="16"><path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16z
	 M15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8
	C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z"/></svg></button></div></div>
	
	<div class="view-options__legend"> </div><div class="view-options__spring"></div>
	<!-- <div class="view-options__select"><label for="view-option-sort">Sort:</label> 
	<select id="view-option-sort" class="form-control form-control-sm" name="">
	<option value="">Price</option>
	</select>
	</div> -->
	<!-- <div class="view-options__select"><label for="view-option-limit">Show:</label> <select id="view-option-limit" class="form-control form-control-sm" name=""><option value="">16</option></select></div> -->
	</div><div class="view-options__body view-options__body--filters">
	
	<div class="view-options__label">Active Filters</div>
	<div class="applied-filters">
		<ul class="applied-filters__list">
			<li class="applied-filters__item">
				<a href="#" class="applied-filters__button applied-filters__button--filter">Shop List 
					<svg width="9" height="9">
						<path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z"/>
					</svg>
				</a>
			</li>
			
			<li class="applied-filters__item">
				<a href="#" class="applied-filters__button applied-filters__button--filter">All product 
					<svg width="9" height="9">
						<path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z"/>
					</svg>
				</a>
			</li>
			<!-- <li class="applied-filters__item">
				<button type="button" class="applied-filters__button applied-filters__button--clear">Clear All</button>
			</li> -->
		</ul>
	</div>
</div>
</div>
		
		
		<div class="products-view__list products-list products-list--grid--4" data-layout="list" data-with-features="false">
			<div class="products-list__head">
				<div class="products-list__column products-list__column--image">Image</div>
				<div class="products-list__column products-list__column--meta">SKU</div>
				<div class="products-list__column products-list__column--product">Product</div>
				<div class="products-list__column products-list__column--rating">Rating</div>
				<div class="products-list__column products-list__column--price">Price</div>
			</div>
			
			<div class="products-list__content">
		<?php
			if(isset($_GET["categoryc"])){
				$category = $_GET["categoryc"];
				$sqls = $conn->query("SELECT * FROM products WHERE dcategory='$category' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;

				$sql = $conn->query("SELECT * FROM products WHERE dcategory='$category' ORDER BY id DESC LIMIT $startFrom, $limit");

			}elseif(isset($_GET["search"])){
				$search = $_GET["search"];
				$sqls = $conn->query("SELECT * FROM products WHERE dcategory LIKE '%$search%' OR dpname LIKE '%$search%' OR dsub_cat LIKE '%$search%' OR dbrand LIKE '%$search%' OR dbudget LIKE '%$search%' OR dpdesc LIKE '%$search%' OR davaliable LIKE '%$search%' OR dprice LIKE '%$search%' OR ddisplay_opt LIKE '%$search%' OR ddisplay_opt2 LIKE '%$search%' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;

				$sql = $conn->query("SELECT * FROM products WHERE dcategory LIKE '%$search%' OR dpname LIKE '%$search%' OR dsub_cat LIKE '%$search%' OR dbrand LIKE '%$search%' OR dbudget LIKE '%$search%' OR dpdesc LIKE '%$search%' OR davaliable LIKE '%$search%' OR dprice LIKE '%$search%' OR ddisplay_opt LIKE '%$search%' OR ddisplay_opt2 LIKE '%$search%' ORDER BY id DESC LIMIT $startFrom, $limit");

			}elseif(isset($_GET['categoryt']) AND isset($_GET['budget'])){
				$category = $_GET["categoryt"];
				$budget = $_GET["budget"];

				$sqls = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dbudget='$budget' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dbudget='$budget' ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['min-price']) AND isset($_GET['max-price'])){
				$min = $_GET["min-price"];
				$max = $_GET["max-price"];

				$sqls = $conn->query("SELECT * FROM products WHERE dprice BETWEEN $min AND $max ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dprice BETWEEN $min AND $max ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['categorybr']) AND isset($_GET['brand'])){
				$category = $_GET["categorybr"];
				$brand = $_GET["brand"];

				$sqls = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dbrand='$brand' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dbrand='$brand' ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['dcat']) AND isset($_GET['subcat'])){
				$category = $_GET["dcat"];
				$subcat = $_GET["subcat"];

				$sqls = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dsub_cat='$subcat' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dcategory='$category' AND dsub_cat='$subcat' ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['width']) AND isset($_GET['profile']) AND isset($_GET['rim'])  ){
				$width = $_GET["width"];
				$profile = $_GET["profile"];
				$rim = $_GET["rim"];

				$sqls = $conn->query("SELECT * FROM products WHERE dwidth='$width' AND dprofile='$profile' AND  drim='$rim' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dwidth='$width' AND dprofile='$profile' AND  drim='$rim' ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['model']) AND isset($_GET['year']) AND isset($_GET['make'])){
				$model = $_GET["model"];
				$year = $_GET["year"];
				$make = $_GET["make"];

				//find the width, profile, and rim from the table and user it 
				$cos = $conn->query("SELECT * FROM `tx_carmodels` WHERE model='$model' AND year='$year' AND vendor='$make' ");
				if($cos->num_rows>0){
					$coss = $cos->fetch_assoc();
					$width = $coss["width"];
					$profile = $coss["profile"];
					$rim = $coss["rim"];
				}else{

				$width = 0;
				$profile = 0;
				$rim = 0;
				}

				$sqls = $conn->query("SELECT * FROM products WHERE dwidth='$width' AND dprofile='$profile' AND  drim='$rim' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dwidth='$model' AND dprofile='$year' AND  drim='$make' ORDER BY id DESC LIMIT $startFrom, $limit");
			}elseif(isset($_GET['budgett']) AND isset($_GET['widtht'])  AND isset($_GET['profilet']) AND isset($_GET['rimt'])  ){
				$budget = $_GET["budgett"];
				$width = $_GET["widtht"];
				$profile = $_GET["profilet"];
				$rim = $_GET["rimt"];

				$sqls = $conn->query("SELECT * FROM products WHERE dbudget='$width' AND dwidth='$width' AND dprofile='$profile' AND  drim='$rim' ORDER BY id DESC ");
				$totalRecords = $sqls->num_rows;
				$totalPages = ceil($totalRecords / $limit);
				$startFrom = ($pn - 1) * $limit;
				
				$sql = $conn->query("SELECT * FROM products WHERE dwidth='$width' AND dprofile='$profile' AND  drim='$rim' ORDER BY id DESC LIMIT $startFrom, $limit");
			}
			else{

			$sqls = $conn->query("SELECT * FROM products ORDER BY id DESC ");
			$totalRecords = $sqls->num_rows;
			$totalPages = ceil($totalRecords / $limit);
			$startFrom = ($pn - 1) * $limit;			
			
			$sql = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT $startFrom, $limit");
			}
            if($sql->num_rows>0){
				while($row=$sql->fetch_assoc()): $product = $row['dpid'];?>
				<input type="hidden" id="pname<?php echo $row['dpid']; ?>" value="<?php echo $row['dpname']; ?>">
				<input type="hidden" id="brand<?php echo $row['dpid']; ?>" value="<?php echo $row['dbrand']; ?>"> 
				<input type="hidden" id="sku<?php echo $row['dpid']; ?>" value="<?php echo $row['dsku']; ?>">
				<input type="hidden" id="vcode<?php echo $row['dpid']; ?>" value="<?php echo $row['dvcode']; ?>">
               	<input type="hidden" id="avaliable<?php echo $row['dpid']; ?>" value="<?php echo $row['davaliable']; ?>">
				<input type="hidden" id="img<?php echo $row['dpid']; ?>" value="<?php echo $row['dimg1']; ?>">
				<input type="hidden" id="quantity<?php echo $row['dpid']; ?>" value="1">
				<input id="fullPayment<?php echo $row['dpid']; ?>" value="<?php echo discount($row['ddiscount'], $row['dprice']); ?>" type="hidden"> 

				<div class="products-list__item">
					<div class="product-card">
						<div class="product-card__actions-list">
							<button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">
								<svg width="16" height="16">
								<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
								</svg>
							</button>

	 						<button class="product-card__action product-card__action--wishlist" id="wishlist" pid="<?php echo $row['dpid']; ?>" type="button" aria-label="Add to wish list">
								 <svg width="16" height="16">
									 <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
									</svg>
							</button> 
							
							<button class="product-card__action product-card__action--compare addToComparer" id="addToComparer" pid="<?php echo $row['dpid']; ?>" type="button" aria-label="Add to compare">
								<svg width="16" height="16">
									<path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
									<path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
									<path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
								</svg>
							</button>
						</div>
	
						<div class="product-card__image">
							<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
								<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
							</a>
							
						</div>

						<div class="product-card__info">
							<div class="product-card__meta">
								<span class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?>
							</div>
							
							<div class="product-card__name"><div>
								<div class="product-card__badges">
								<div class="tag-badge tag-badge--sale">sale</div>
								<?php if($row['ddisplay_opt2']=="New"){ ?>
								<div class="tag-badge tag-badge--new">new</div>
								<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
								<div class="tag-badge tag-badge--hot">hot</div>
								<?php } ?>
								</div>
								<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"><?php echo $row['dpname']; ?></a>
							</div>
						</div>

						<div class="product-card__rating">
							<div class="rating product-card__rating-stars">
								<div class="rating__body">
								<?php echo starRating($product); ?>
								</div>
							</div>
							<div class="product-card__rating-label"><?php echo starReview($product) ?></div>
						</div>
	
						<div class="product-card__features">
						<?php echo remove_tags($row['dpdesc']); ?>
							<!-- <ul>
								<li>Speed: 750 RPM</li>
								<li>Power Source: Cordless-Electric</li>
								<li>Battery Cell Type: Lithium</li>
								<li>Voltage: 20 Volts</li>
								<li>Battery Capacity: 2 Ah</li>
							</ul> -->
						</div>
					</div>

					<div class="product-card__footer">
						<div class="product-card__prices">
							<div class="product-card__price product-card__price--current">&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?></div>
						</div>
						<button class="product-card__addtocart-icon" id="addToCarts" pid="<?php echo $row['dpid']?>" type="button" aria-label="Add to cart">
							<svg width="20" height="20">
								<circle cx="7" cy="17" r="2"/>
								<circle cx="15" cy="17" r="2"/>
								<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
							</svg>
						</button>

						<button  class="product-card__addtocart-full shoplist" pid="<?php echo $row['dpid']?>" type="button" id="addToCarts">Add to cart</button>

						<button class="product-card__wishlist" type="button" id="wishlist" pid="<?php echo $row['dpid']; ?>">
							<svg width="16" height="16">
								<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
							</svg> 
							<span>Add to wishlist</span>
						</button> 
						
						<button class="product-card__compare" type="button"  id="addToComparer" pid="<?php echo $row['dpid']; ?>">
							<svg width="16" height="16">
								<path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
								<path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
								<path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
							</svg> 
							<span>Add to compare</span>
						</button>
					</div>
				</div>
			</div>


	<?php endwhile; }else{ echo "<p class='text-danger' style='margin-left:10px'> Sorry no result found </p>"; } ?>
	
	

</div>
</div>

<div class="products-view__pagination">
	<nav aria-label="Page navigation example">
		<ul class="pagination">
			
		<?php


		if(isset($_GET['categoryc'])){

			$link = "shop-list?categoryc=".$_GET['categoryc']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['search'])){

			$link="shop-list?search=".$_GET['search']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['categoryt']) AND isset($_GET['budget'])){
			
			$link="shop-list?categoryt=".$_GET['categoryt']."&budget=".$_GET['budget']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['min-price']) AND isset($_GET['max-price'])){
			
			$link = "shop-list?min-price=".$_GET['min-price']."&max-price=".$_GET['max-price']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['categorybr']) AND isset($_GET['brand'])){
			
			$link = "shop-list?categorybr=".$_GET['categorybr']."&brand=".$_GET['brand']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['dcat']) AND isset($_GET['subcat'])){
			
			$link = "shop-list?dcat=".$_GET['dcat']."&subcat=".$_GET['subcat']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['width']) AND isset($_GET['profile']) AND isset($_GET['rim'])){			
			
			$link = "shop-list?width=".$_GET['width']."&profile=".$_GET['profile']."&rim=".$_GET['rim']."&";
			pagination($link, $row, $pn, $totalPages);

		}elseif(isset($_GET['budgett']) AND isset($_GET['widtht']) AND isset($_GET['profilet']) AND isset($_GET['rimt'])){
			
			$link = 'shop-list?budgett='.$_GET['budgett'].'&widtht='.$_GET['widtht'].'&profilet='.$_GET['profilet'].'&rimt='.$_GET['rimt'].'&';
			pagination($link, $row, $pn, $totalPages);

		}
		else{	

			$link = 'shop-list?';
			pagination($link, $row, $pn, $totalPages);
			// include 'pagination.php';
		}
		?>
			<!-- <li class="page-item disabled">
				<a class="page-link page-link--with-arrow" href="#" aria-label="Previous">
					<span class="page-link__arrow page-link__arrow--left" aria-hidden="true">
						<svg width="7" height="11">
							<path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
						</svg>
					</span>
				</a>
			</li>
			
			<li class="page-item">
				<a class="page-link" href="#">1</a>
			</li>
			<li class="page-item active" aria-current="page"><span class="page-link">2 <span class="sr-only">(current)</span></span></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">4</a></li>
			<li class="page-item page-item--dots"><div class="pagination__dots"></div></li>
			<li class="page-item"><a class="page-link" href="#">9</a></li>
			<li class="page-item">
				<a class="page-link page-link--with-arrow" href="#" aria-label="Next">
					<span class="page-link__arrow page-link__arrow--right" aria-hidden="true">
						<svg width="7" height="11">
							<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9 C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
						</svg>
					</span>
				</a>
			</li> -->
		</ul>
	</nav>
			<div class="goto-page">
                <form action="url" method="POST" onsubmit="return pageValidation()">
                    <input type="submit" class="goto-button" value="Go to"> 
					<input type="hidden" name="url" value="<?php
					if(isset($_GET['categoryc'])){
						echo $link = "shop-list?categoryc=".$_GET['categoryc']."&";
					}elseif(isset($_GET['search'])){
						echo $link="shop-list?search=".$_GET['search']."&";
					}elseif(isset($_GET['categoryt']) AND isset($_GET['budget'])){
						echo $link="shop-list?categoryt=".$_GET['categoryt']."&budget=".$_GET['budget']."&";
					}elseif(isset($_GET['min-price']) AND isset($_GET['max-price'])){			
						echo $link = "shop-list?min-price=".$_GET['min-price']."&max-price=".$_GET['max-price']."&";
					}elseif(isset($_GET['categorybr']) AND isset($_GET['brand'])){			
						echo $link = "shop-list?categorybr=".$_GET['categorybr']."&brand=".$_GET['brand']."&";
					}elseif(isset($_GET['dcat']) AND isset($_GET['subcat'])){			
						echo $link = "shop-list?dcat=".$_GET['dcat']."&subcat=".$_GET['subcat']."&";
					}elseif(isset($_GET['width']) AND isset($_GET['profile']) AND isset($_GET['rim'])){			
						echo $link = "shop-list?width=".$_GET['width']."&profile=".$_GET['profile']."&rim=".$_GET['rim']."&";
					}elseif(isset($_GET['budgett']) AND isset($_GET['widtht']) AND isset($_GET['profilet']) AND isset($_GET['rimt'])){
						echo $link = 'shop-list?budgett='.$_GET['budgett'].'&widtht='.$_GET['widtht'].'&profilet='.$_GET['profilet'].'&rimt='.$_GET['rimt'].'&';
					}
					else{				
						echo $link = 'shop-list?';
					}
					?>">
                    <input type="text" class="enter-page-no"  name="page" min="1" id="page-no"> 
                    <input type="hidden"  id="total-page" value="<?php echo $totalPages;?>">
                </form>
            </div>
	<!-- <div class="products-view__pagination-legend">Showing 6 of 98 products</div> -->

</div>
</div>
</div>
</div>
</div>

<div class="block-space block-space--layout--before-footer"></div>
</div>
</div>
</div><!-- site__body / end --><!-- site__footer -->

	<?php include("footer.php"); ?>
	<!-- site__footer / end -->
</div><!-- site / end --><!-- mobile-menu -->
<?php include("mobile-header2.php"); ?>
	
	<!-- mobile-menu / end --><!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div><!-- quickview-modal / end --><!-- add-vehicle-modal -->
	
	<?php include("scripts.php"); ?>
</body>
<!-- Mirrored from red-parts.html.themeforest.scompiler.ru/themes/red-ltr/shop-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:12:18 GMT -->
</html>

<!-- <script>

		$(document).ready(function(){
			$(document).on("click","#addToComparer",function(){
			alert("Yes");
		});
		})
	</script> -->
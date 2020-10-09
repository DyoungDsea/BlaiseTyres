
<?php include("head.php"); ?>

<body>
	<!-- site -->
	<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
		<!-- site__body -->
		<div class="site__body">

		

		<div class="block-space block-space--layout--divider-xs"></div>
			<div class="block block-slideshow" style="margin-top:-30px">
				<div class="container-fluid" style="padding:0px 0px;">
					<div class="block-slideshow__carousel">
						<div class="owl-carousel" id="header-slider">
						<?php 
							$slide = $conn->query("SELECT * FROM `dslide` ORDER BY id DESC");
							if($slide->num_rows>0){
								while($slider = $slide->fetch_assoc()): ?>
								<span class="block-slideshow__item" ><span
									class="block-slideshow__item-image block-slideshow__item-image--desktop"
									style="background-image: url('_slide_images/<?php echo $slider['dmobile']; ?>')"></span> <span
									class="block-slideshow__item-image block-slideshow__item-image--mobile"
									style="background-image: url('_slide_images/<?php echo $slider['dimg']; ?>')"></span> <span
									class="block-slideshow__item-offer"><?php echo strtoupper($slider['dtitle1']); ?> </span><span
									class="block-slideshow__item-title"><?php echo wordwrap(ucwords(remove_tags($slider['dtitle2'])), 23, "<br>\n",TRUE); ?>
								</span><span class="block-slideshow__item-details"><?php echo wordwrap(ucfirst(remove_tags($slider['dtitle3'])), 48, "<br>\n",TRUE); ?> </span>
								
								<?php if(!empty($slider['durl']) AND !empty($slider['dcaption'])){?><span class="block-slideshow__item-button"> <a href="<?php echo $slider['durl']; ?>" style="color:white !important"><?php echo ucwords($slider['dcaption']); ?> </a> </span><?php } ?>
								</span>
								<?php endwhile; } ?>
								
								<!-- <a class="block-slideshow__item" href="#"><span
									class="block-slideshow__item-image block-slideshow__item-image--desktop"
									style="background-image: url('images/slides/slide-2.jpg')"></span> <span
									class="block-slideshow__item-image block-slideshow__item-image--mobile"
									style="background-image: url('images/slides/slide-2-mobile.jpg')"></span> <span
									class="block-slideshow__item-title">Not enough<br>spare parts? </span><span
									class="block-slideshow__item-details">We have everything you need – replacement
									parts,<br>performance parts, accessories, oil & fluids,<br>tools and much more...
								</span><span class="block-slideshow__item-button">Shop Now </span></a>

								<a class="block-slideshow__item" href="#"><span
									class="block-slideshow__item-image block-slideshow__item-image--desktop"
									style="background-image: url('images/slides/slide-1.jpg')"></span> <span
									class="block-slideshow__item-image block-slideshow__item-image--mobile"
									style="background-image: url('images/slides/slide-1-mobile.jpg')"></span> <span
									class="block-slideshow__item-offer">30% OFF </span><span
									class="block-slideshow__item-title">Big Choice Of<br>Wheel Tires </span><span
									class="block-slideshow__item-details">Any size and diameter, with or without
									spikes,<br>summer or winter, rain or snow. </span><span
									class="block-slideshow__item-button">Shop Now</span></a> -->
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-xs"></div>

			<?php include("block.php"); ?>

			<div class="block-finder block">
				<div class="decor block-finder__decor decor--type--bottom">
					<div class="decor__body">
						<div class="decor__start"></div>
						<div class="decor__end"></div>
						<div class="decor__center"></div>
					</div>
				</div>

				<div class="block-finder__image" style="background-image: url('images/finder-1903x500.jpg');"></div>
				<div class="block-finder__body container container--max--xl">
					<div class="block-finder__title">Find Parts For Your Vehicle</div>
					<div class="block-finder__subtitle">Over hundreds of brands and tens of thousands of parts</div>
					<div id="search">
					<form class="block-finder__form"  method="GET" action="shop-list">
					<div class="block-finder__form-control block-finder__form-control--select"><select name="width" id="sizeWidth"
							aria-label="Vehicle Year">
							<option value="none">Select Width</option>
							<?php
							$sql = $conn->query("SELECT * FROM `tx_tyrespecifications` GROUP BY front_width ORDER BY front_width");
							if($sql->num_rows>0){
								while($row=$sql->fetch_assoc()){
								 echo	$out = '<option>'.$row['front_width'].'</option>';
								}
							}

						?>
						</select></div>
					<div class="block-finder__form-control block-finder__form-control--select"><select name="profile" id="sizeProfile"
							aria-label="Vehicle Make" disabled="disabled">
							<option value="none">Select Profile</option>
							
						</select></div>
					<div class="block-finder__form-control block-finder__form-control--select"><select name="rim" id="sizeRim"
							aria-label="Vehicle Model" disabled="disabled">
							<option value="none">Select Rim</option>

						</select></div>

					<button class="block-finder__form-control block-finder__form-control--button"
						type="submit">Search</button>
				</form>
					</div>
					<div Style="margin-top:40px;"> 
					<p style="margin-top:20px;"><b>
					<a style="color:white !important" id="size" href="#size-search"><u>Search by Size</u></a> |
					<a style="color:white !important" id="brand" href="#brand-search"><u>Search by Brand</u></a> | 
					<a style="color:white !important" id="budget" href="#budget-search"><u>Search by Budget</u></a> | 
					<a style="color:white !important" id="name" href="#vehicle-search"><u>Search by Vehicle Make</u></a>
					</b></p>
									<!-- <hr> -->
					 </div>

				</div>
			</div>
		
			<div class="block-space block-space--layout--divider-nl"></div>
			<div class="block block-products-carousel" data-layout="grid-5">
				<div class="container">
					<div class="section-header">
						<div class="section-header__body">
							<h2 class="section-header__title">Featured Products</h2>
							<div class="section-header__spring"></div>
							<ul class="section-header__groups">
								<li class="section-header__groups-item"><button type="button"
										class="section-header__groups-button section-header__groups-button--active">All</button>
								</li>
								<!-- <li class="section-header__groups-item"><button type="button"
										class="section-header__groups-button">Power Tools</button></li>
								<li class="section-header__groups-item"><button type="button"
										class="section-header__groups-button">Hand Tools</button></li>
								<li class="section-header__groups-item"><button type="button"
										class="section-header__groups-button">Plumbing</button></li> -->
							</ul>
							<div class="section-header__arrows">
								<div class="arrow section-header__arrow section-header__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow section-header__arrow section-header__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="section-header__divider"></div>
						</div>
					</div>
					<div class="block-products-carousel__carousel">
						<div class="block-products-carousel__carousel-loader"></div>
						<div class="owl-carousel">
						<?php 
						$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='featured' ORDER BY id DESC LIMIT 10");
						if($sql->num_rows>0):
							while($row=$sql->fetch_assoc()):
								$product = $row['dpid'];
							
							?>
							<div class="block-products-carousel__column">
								<div class="block-products-carousel__cell">

									<div class="product-card product-card--layout--grid">

										<div class="product-card__actions-list">
											<button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16">
													<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg>
											</button> 
											<!-- <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">
												<svg width="16" height="16">
													<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />
												</svg>
											</button>  -->
											<!-- <button
												class="product-card__action product-card__action--compare" type="button"
												aria-label="Add to compare"><svg width="16" height="16">
													<path
														d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
													<path
														d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
													<path
														d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
													</svg></button> -->
												</div>
										<div class="product-card__image">
										<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
										<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
										</a>
											<div
												class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
												<div class="status-badge__body">
													<div class="status-badge__icon"><svg width="13" height="13">
															<path
																d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
															</svg></div>
													<div class="status-badge__text"><?php echo $row['dpname']; ?></div>
													<div class="status-badge__tooltip" tabindex="0"
														data-toggle="tooltip"
														title="<?php echo $row['dpname']; ?>">
													</div>
												</div>
											</div>
										</div>
										<div class="product-card__info">
											<div class="product-card__meta"><span
													class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?></div>
											<div class="product-card__name">
												<div>
													<div class="product-card__badges">
														<div class="tag-badge tag-badge--sale">sale</div>
														<?php if($row['ddisplay_opt2']=="New"){ ?>
														<div class="tag-badge tag-badge--new">new</div>
														<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
														<div class="tag-badge tag-badge--hot">hot</div>
														<?php } ?>
													</div><a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"><?php echo $row['dpname']; ?></a>
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
										</div>
										<div class="product-card__footer">
											<div class="product-card__prices">
												<div class="product-card__price product-card__price--current"><?php echo money($row['dprice']); ?>
												</div>
											</div>
											<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
											<button class="product-card__addtocart-icon" type="button"
												aria-label="Add to cart"><svg width="20" height="20">
													<circle cx="7" cy="17" r="2" />
													<circle cx="15" cy="17" r="2" />
													<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" /></svg></button>
													</a>
										</div>
									</div>
								</div>
							</div>

							<?php endwhile; endif; ?>

							
							
						
							
							
							
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-nl"></div>
			<div class="block block-sale">
				<div class="block-sale__content">
					<div class="block-sale__header">
						<div class="block-sale__title">Attention! Deal Zone</div>
						<div class="block-sale__subtitle">Hurry up! Discounts up to 70%</div>
						<div class="block-sale__timer">
							<div class="timer">
								<div class="timer__part">
									<div class="timer__part-value timer__part-value--days">02</div>
									<div class="timer__part-label">Days</div>
								</div>
								<div class="timer__dots"></div>
								<div class="timer__part">
									<div class="timer__part-value timer__part-value--hours">23</div>
									<div class="timer__part-label">Hrs</div>
								</div>
								<div class="timer__dots"></div>
								<div class="timer__part">
									<div class="timer__part-value timer__part-value--minutes">07</div>
									<div class="timer__part-label">Mins</div>
								</div>
								<div class="timer__dots"></div>
								<div class="timer__part">
									<div class="timer__part-value timer__part-value--seconds">54</div>
									<div class="timer__part-label">Secs</div>
								</div>
							</div>
						</div>
						<div class="block-sale__controls">
							<div class="arrow block-sale__arrow block-sale__arrow--prev arrow--prev"><button
									class="arrow__button" type="button"><svg width="7" height="11">
										<path
											d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
										</svg></button></div>
							<div class="block-sale__link"><a href="shop-list">View All Available Offers</a></div>
							<div class="arrow block-sale__arrow block-sale__arrow--next arrow--next"><button
									class="arrow__button" type="button"><svg width="7" height="11">
										<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							<div class="decor block-sale__header-decor decor--type--center">
								<div class="decor__body">
									<div class="decor__start"></div>
									<div class="decor__end"></div>
									<div class="decor__center"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="block-sale__body">
						<div class="decor block-sale__body-decor decor--type--bottom">
							<div class="decor__body">
								<div class="decor__start"></div>
								<div class="decor__end"></div>
								<div class="decor__center"></div>
							</div>
						</div>
						<div class="block-sale__image" style="background-image: url('images/sale-1903x640.jpg');"></div>
						<div class="container">
							<div class="block-sale__carousel">
								<div class="owl-carousel">
								<?php 
									$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt2='Deal' ORDER BY RAND() LIMIT 10");
									if($sql->num_rows>0){
										while($row=$sql->fetch_assoc()):
											$product = $row['dpid'];
										
										 ?>
									<div class="block-sale__item">
										<div class="product-card">
											<div class="product-card__actions-list"><button
													class="product-card__action product-card__action--quickview"
													type="button" aria-label="Quick view"><svg width="16" height="16">
														<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg>
													</button> 
													<!-- <button
													class="product-card__action product-card__action--wishlist"
													type="button" aria-label="Add to wish list"><svg width="16"
														height="16">
														<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" /></svg></button> <button
													class="product-card__action product-card__action--compare"
													type="button" aria-label="Add to compare"><svg width="16"
														height="16">
														<path
															d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
														<path
															d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
														<path
															d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" /> 
														</svg></button>-->
													</div>
											<div class="product-card__image">
											<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
												<div
													class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
													<div class="status-badge__body">
														<div class="status-badge__icon"><svg width="13" height="13">
																<path
																	d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
																</svg></div>
														<div class="status-badge__text"><?php echo $row['dpname']; ?>
														</div>
														<div class="status-badge__tooltip" tabindex="0"
															data-toggle="tooltip"
															title="<?php echo $row['dpname']; ?>">
														</div>
													</div>
												</div>
											</div>
											<div class="product-card__info">
												<div class="product-card__meta"><span
														class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?></div>
												<div class="product-card__name">
													<div>
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
											</div>
											<div class="product-card__footer">
												<div class="product-card__prices">
													<div class="product-card__price product-card__price--current">
													&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
													</div>
												</div>
												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>" class="product-card__addtocart-icon" 
													aria-label="Add to cart"><svg width="20" height="20">
														<circle cx="7" cy="17" r="2" />
														<circle cx="15" cy="17" r="2" />
														<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" /></svg></a>
											</div>
										</div>
									</div>

									<?php endwhile; } ?>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-lg"></div>
			<div class="block block-zone">
				<div class="container">
					<div class="block-zone__body">
						<div class="block-zone__card category-card category-card--layout--overlay">
							<div class="category-card__body">
								<div class="category-card__overlay-image"><img
										srcset="images/categories/category-overlay-1-mobile.jpg 530w, images/categories/category-overlay-1.jpg 305w"
										src="images/categories/category-overlay-1.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__overlay-image category-card__overlay-image--blur"><img
										srcset="images/categories/category-overlay-1-mobile.jpg 530w, images/categories/category-overlay-1.jpg 305w"
										src="images/categories/category-overlay-1.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__content">
									<div class="category-card__info">
										<div class="category-card__name"><a
												href="shop-list?search=Tyres">Tyres</a></div>
										<ul class="category-card__children">
										<?php 
										$cate = $conn->query("SELECT * from `sub_categories` where dcategory='Tyres' AND status='active' ORDER BY name LIMIT 9");
										if($cate->num_rows > 0){
											while($cat=$cate->fetch_assoc()):
											$dcate= $cat['dcategory'];
											$brand= $cat['name'];
											?>
											<li><a href="shop-list?dcat=<?php echo $cat['dcategory'] ?>&subcat=<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></a></li>
											<?php endwhile; } ?>
										</ul>
										<div class="category-card__actions"><a href="shop-list?tyres=Tyres" class="btn btn-primary btn-sm">Shop All</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="block-zone__widget">
							<div class="block-zone__widget-header">
								<div class="block-zone__tabs"><button
										class="block-zone__tabs-button block-zone__tabs-button--active"
										type="button">Featured</button> <button class="block-zone__tabs-button"
										type="button">Bestsellers</button> <button class="block-zone__tabs-button"
										type="button">Popular</button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="block-zone__widget-body">
								<div class="block-zone__carousel">
									<div class="block-zone__carousel-loader"></div>
									<div class="owl-carousel">
									<?php 
									$sql = $conn->query("SELECT * FROM products WHERE dcategory='Tyres' ORDER BY id DESC");
									if($sql->num_rows>0){
										while($row=$sql->fetch_assoc()): 
										$product = $row['dpid'];
										?>

										<div class="block-zone__carousel-item">
											<div class="product-card">
												<div class="product-card__actions-list">
													<!-- <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16">
															<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button> <button
														class="product-card__action product-card__action--wishlist"
														type="button" aria-label="Add to wish list"><svg width="16"
															height="16">
															<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" /></svg></button> <button
														class="product-card__action product-card__action--compare"
														type="button" aria-label="Add to compare"><svg width="16"
															height="16">
															<path
																d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
															<path
																d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
															<path
																d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
															</svg></button> -->
														</div>
												<div class="product-card__image">

												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
													<div
														class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
														<div class="status-badge__body">
															<div class="status-badge__icon"><svg width="13" height="13">
																	<path
																		d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
																	</svg></div>
															<div class="status-badge__text"></div>
															<div class="status-badge__tooltip" tabindex="0"
																data-toggle="tooltip"
																title="<?php echo $row['dpname']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="product-card__info">
													<div class="product-card__meta"><span
															class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?>
													</div>
													<div class="product-card__name">
														<div>
															<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
															</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
												</div>
												<div class="product-card__footer">
													<div class="product-card__prices">
														<div class="product-card__price product-card__price--current">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
													</div>
													</div>
													<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"
													 class="product-card__addtocart-icon" 
														aria-label="Add to cart"><svg width="20" height="20">
															<circle cx="7" cy="17" r="2" />
															<circle cx="15" cy="17" r="2" />
															<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" /></svg></a>
												</div>
											</div>
										</div>

															<?php endwhile; } ?>
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-sm"></div>
			<div class="block block-zone">
				<div class="container">
					<div class="block-zone__body">
						<div class="block-zone__card category-card category-card--layout--overlay">
							<div class="category-card__body">
								<div class="category-card__overlay-image"><img
										srcset="images/categories/category-overlay-2-mobile.jpg 530w, images/categories/category-overlay-2.jpg 305w"
										src="images/categories/category-overlay-2.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__overlay-image category-card__overlay-image--blur"><img
										srcset="images/categories/category-overlay-2-mobile.jpg 530w, images/categories/category-overlay-2.jpg 305w"
										src="images/categories/category-overlay-2.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__content">
									<div class="category-card__info">
										<div class="category-card__name"><a
												href="shop-list?search=Lubricants">Brands</a></div>
										<ul class="category-card__children">
										<?php 
										$cate = $conn->query("SELECT * from `brands` where status='active' ORDER BY name LIMIT 8");
										if($cate->num_rows > 0){
											while($cat=$cate->fetch_assoc()):
											$dcate= $cat['dcategory'];
											$brand= $cat['name'];
											?>
											<li><a href="shop-list?dcat=<?php echo $cat['dcategory'] ?>&subcat=<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></a></li>
											<?php endwhile; } ?>
										</ul>
										</ul>
										<!--<div class="category-card__actions">-->
										<!--	<a href="shop-list?search=brand" class="btn btn-primary btn-sm">Shop All</a>-->
										<!--</div>-->
									</div>
								</div>
							</div>
						</div>
						<div class="block-zone__widget">
							<div class="block-zone__widget-header">
								<div class="block-zone__tabs"><button
										class="block-zone__tabs-button block-zone__tabs-button--active"
										type="button">Featured</button> <button class="block-zone__tabs-button"
										type="button">Bestsellers</button> <button class="block-zone__tabs-button"
										type="button">Popular</button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="block-zone__widget-body">
								<div class="block-zone__carousel">
									<div class="block-zone__carousel-loader"></div>
									<div class="owl-carousel">

									<?php 
									$sql = $conn->query("SELECT * from `products`  ORDER BY dpname LIMIT 10");
									if($sql->num_rows>0){
										while($row=$sql->fetch_assoc()):
										$product = $row['dpid'];
										 ?>

										<div class="block-zone__carousel-item">
											<div class="product-card">
												<div class="product-card__actions-list">
													<!-- <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16">
															<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button> <button
														class="product-card__action product-card__action--wishlist"
														type="button" aria-label="Add to wish list"><svg width="16"
															height="16">
															<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" /></svg></button> <button
														class="product-card__action product-card__action--compare"
														type="button" aria-label="Add to compare"><svg width="16"
															height="16">
															<path
																d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
															<path
																d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
															<path
																d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
															</svg></button> -->
														</div>
												<div class="product-card__image">

												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
													<div
														class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
														<div class="status-badge__body">
															<div class="status-badge__icon"><svg width="13" height="13">
																	<path
																		d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
																	</svg></div>
															<div class="status-badge__text"></div>
															<div class="status-badge__tooltip" tabindex="0"
																data-toggle="tooltip"
																title="<?php echo $row['dpname']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="product-card__info">
													<div class="product-card__meta"><span
															class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?>
													</div>
													<div class="product-card__name">
														<div>
															<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
															</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
												</div>
												<div class="product-card__footer">
													<div class="product-card__prices">
														<div class="product-card__price product-card__price--current">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
													</div>
													</div>
													<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"
													 class="product-card__addtocart-icon" 
														aria-label="Add to cart"><svg width="20" height="20">
															<circle cx="7" cy="17" r="2" />
															<circle cx="15" cy="17" r="2" />
															<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" /></svg></a>
												</div>
											</div>
										</div>

															<?php endwhile; } ?>

										
									
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-sm"></div>
			<div class="block block-zone">
				<div class="container">
					<div class="block-zone__body">
						<div class="block-zone__card category-card category-card--layout--overlay">
							<div class="category-card__body">
								<div class="category-card__overlay-image"><img
										srcset="images/categories/category-overlay-3-mobile.jpg 530w, images/categories/category-overlay-3.jpg 305w"
										src="images/categories/category-overlay-3.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__overlay-image category-card__overlay-image--blur"><img
										srcset="images/categories/category-overlay-3-mobile.jpg 530w, images/categories/category-overlay-3.jpg 305w"
										src="images/categories/category-overlay-3.jpg"
										sizes="(max-width: 575px) 530px, 305px" alt=""></div>
								<div class="category-card__content">
									<div class="category-card__info">
										<div class="category-card__name"><a
												href="shop-list?search=Lubricants">Lubricants</a></div>
										<ul class="category-card__children">
										<?php 
										$cate = $conn->query("SELECT * FROM sub_categories where dcategory='Lubricants' and status='active' order by name asc LIMIT 8");
										if($cate->num_rows > 0){
											while($cat=$cate->fetch_assoc()):
											$dcate= $cat['dcategory'];
											$brand= $cat['name'];
											?>
											<li><a href="shop-list?dcat=<?php echo $cat['dcategory'] ?>&subcat=<?php echo $cat['name'] ?>"><?php echo $cat['name'] ?></a></li>
											<?php endwhile; } ?>
										</ul>
										<div class="category-card__actions"><a href="shop-list?search=Lubricants"
												class="btn btn-primary btn-sm">Shop All</a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="block-zone__widget">
							<div class="block-zone__widget-header">
								<div class="block-zone__tabs"><button
										class="block-zone__tabs-button block-zone__tabs-button--active"
										type="button">Featured</button> <button class="block-zone__tabs-button"
										type="button">Bestsellers</button> <button class="block-zone__tabs-button"
										type="button">Popular</button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow block-zone__arrow block-zone__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="block-zone__widget-body">
								<div class="block-zone__carousel">
									<div class="block-zone__carousel-loader"></div>
									<div class="owl-carousel">


									<?php 
									$sql = $conn->query("SELECT * FROM products WHERE dcategory='Lubricants' ORDER BY id DESC");
									if($sql->num_rows>0){
										while($row=$sql->fetch_assoc()):
										$product =$row['dpid'];
										 ?>

										<div class="block-zone__carousel-item">
											<div class="product-card">
												<div class="product-card__actions-list">
													<!-- <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view"><svg width="16" height="16">
															<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button> <button
														class="product-card__action product-card__action--wishlist"
														type="button" aria-label="Add to wish list"><svg width="16"
															height="16">
															<path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7 l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" /></svg></button> <button
														class="product-card__action product-card__action--compare"
														type="button" aria-label="Add to compare"><svg width="16"
															height="16">
															<path
																d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />
															<path
																d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />
															<path
																d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />
															</svg></button> -->
														</div>
												<div class="product-card__image">

												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
													<div
														class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
														<div class="status-badge__body">
															<div class="status-badge__icon"><svg width="13" height="13">
																	<path
																		d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />
																	</svg></div>
															<div class="status-badge__text"></div>
															<div class="status-badge__tooltip" tabindex="0"
																data-toggle="tooltip"
																title="<?php echo $row['dpname']; ?>">
															</div>
														</div>
													</div>
												</div>
												<div class="product-card__info">
													<div class="product-card__meta"><span
															class="product-card__meta-title">SKU:</span> <?php echo $row['dsku']; ?>
													</div>
													<div class="product-card__name">
														<div>
															<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
															</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
												</div>
												<div class="product-card__footer">
													<div class="product-card__prices">
														<div class="product-card__price product-card__price--current">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
													</div>
													</div>
													<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>"
													 class="product-card__addtocart-icon" 
														aria-label="Add to cart"><svg width="20" height="20">
															<circle cx="7" cy="17" r="2" />
															<circle cx="15" cy="17" r="2" />
															<path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" /></svg></a>
												</div>
											</div>
										</div>

															<?php endwhile; } ?>

										
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-nl"></div>
			<div class="block-banners block">
				<div class="container">
					<div class="block-banners__list"><a href="shop-list?search=Lubricants" class="block-banners__item block-banners__item--style--one"><span
								class="block-banners__item-image"><img src="images/banners/banner1.jpg"
									alt=""></span><span
								class="block-banners__item-image block-banners__item-image--blur"><img src="images/banners/banner1.jpg" alt=""></span><span
								class="block-banners__item-title">Motor Oils</span> <span
								class="block-banners__item-details">Synthetic motor oil with free shipping<br>Friction
								free life guaranteed </span><span class="block-banners__item-button btn btn-primary btn-sm">Shop Now </span></a>
								<a href="#" class="block-banners__item block-banners__item--style--two"><span
								class="block-banners__item-image"><img src="images/banners/banner2.jpg"
									alt=""></span><span
								class="block-banners__item-image block-banners__item-image--blur"><img
									src="images/banners/banner2.jpg" alt=""></span><span
								class="block-banners__item-title">Tyres and Wheels</span> <span
								class="block-banners__item-details">This is a Nigerian tyre centre for distribution <br> and sales of brand new tyres and tubes for cars and vehicles. </span><span
								class="block-banners__item-button btn btn-primary btn-sm">Shop Now</span></a></div>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-nl"></div>
			<div class="block block-products-carousel" data-layout="horizontal">
				<div class="container">
					<div class="section-header">
						<div class="section-header__body">
							<h2 class="section-header__title">New Arrivals</h2>
							<div class="section-header__spring"></div>
							<ul class="section-header__links">
								<!-- <li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Wheel Covers</a></li>
								<li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Timing Belts</a></li>
								<li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Oil Pans</a></li>
								<li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Show All</a></li> -->
							</ul>
							<div class="section-header__arrows">
								<div class="arrow section-header__arrow section-header__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow section-header__arrow section-header__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="section-header__divider"></div>
						</div>
					</div>
					<div class="block-products-carousel__carousel">
						<div class="block-products-carousel__carousel-loader"></div>
						<div class="owl-carousel">

							
							<?php 
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt2='New' ORDER BY id DESC LIMIT 10");
							if($sql->num_rows>0){
								while($row=$sql->fetch_assoc()):
								$product = $row['dpid'];
								?>
                                <div class="block-products-carousel__column">
								<div class="block-products-carousel__cell">
									<div class="product-card product-card--layout--horizontal">
										<div class="product-card__actions-list"><button
												class="product-card__action product-card__action--quickview"
												type="button" aria-label="Quick view"><svg width="16" height="16">
													<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button></div>
										<div class="product-card__image">
										<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
										<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
										</a>		
									</div>
										<div class="product-card__info">
											<div class="product-card__name">
												<div>
													<div class="product-card__badges">
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
										</div>
										<div class="product-card__footer">
											<div class="product-card__prices">
											    <?php if($row['ddiscount'] !=''):?>
												<div class="product-card__price product-card__price--old">
														&#8358;<?php echo number_format($row['dprice']); ?>
													
												</div>
                                                <?php endif;?>
												<div class="product-card__price product-card__price--new " style="margin-left:4px">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
</div>
									<?php endwhile; }?>
								
							
						</div>
					</div>
				</div>
			</div>
			<?php 
					$blog= $conn->query("SELECT * FROM dblog ORDER BY id DESC LIMIT 10");
					if($blog->num_rows>0):?>
			<div class="block-space block-space--layout--divider-nl"></div>

			<div class="block block-posts-carousel block-posts-carousel--layout--grid" data-layout="grid">
				<div class="container">
					<div class="section-header">
						<div class="section-header__body">
							<h2 class="section-header__title">Latest News</h2>
							<div class="section-header__spring"></div>
							<ul class="section-header__links">
								<!-- <li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Special Offers</a></li>
								<li class="section-header__links-item"><a href="#"
										class="section-header__links-link">New Arrivals</a></li>
								<li class="section-header__links-item"><a href="#"
										class="section-header__links-link">Reviews</a></li> -->
							</ul>
							<div class="section-header__arrows">
								<div class="arrow section-header__arrow section-header__arrow--prev arrow--prev"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path
												d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
											</svg></button></div>
								<div class="arrow section-header__arrow section-header__arrow--next arrow--next"><button
										class="arrow__button" type="button"><svg width="7" height="11">
											<path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg></button></div>
							</div>
							<div class="section-header__divider"></div>
						</div>
					</div>
					<div class="block-posts-carousel__carousel">
						<div class="owl-carousel">
					<?php 
					$blog= $conn->query("SELECT * FROM dblog ORDER BY id DESC LIMIT 10");
					if($blog->num_rows>0):
						while($row=$blog->fetch_assoc()): ?>
							<div class="block-posts-carousel__item">
								<div class="post-card">
									<div class="post-card__image">
										<a href="post-full-width?id=<?php echo $row['dblog_id'] ?>">
											<img src="_slide_blog/<?php echo $row['dimg'] ?>" alt=""></a></div>
									<div class="post-card__content">
										
										<div class="post-card__title">
											<h2><a href="post-full-width?id=<?php echo $row['dblog_id'] ?>"><?php echo $row['dtitle'] ?></a></h2>
										</div>
										
										<div class="post-card__excerpt">
											<div class="typography">
											<?php echo $row['ddesc'] ?>
											</div>
										</div>
										<div class="post-card__more">
											<a href="post-full-width?id=<?php echo $row['dblog_id'] ?>" class="btn btn-secondary btn-sm">Read more</a></div>
									</div>
								</div>
							</div>
						<?php endwhile; endif; ?>
							
							
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="block-space block-space--layout--divider-nl"></div>
			<div class="block block-brands block-brands--layout--columns-8-full">
				<div class="container">
					<ul class="block-brands__list">
					<?php 
					$cate = $conn->query("SELECT * from `brands` where status='active' GROUP BY name ORDER BY name LIMIT 21");
					if($cate->num_rows > 0){
						while($cat=$cate->fetch_assoc()):
						$dcate= $cat['dcategory'];
						$brand= $cat['name'];
						?>
						<li class="block-brands__item">
							<a href="shop-list?categorybr=<?php echo $cat['dcategory'] ?>&brand=<?php echo $cat['name'] ?>" class="block-brands__item-link">
								<img src="_brands_images/<?php echo $cat['img'] ?>" alt=""> 
								<span class="block-brands__item-name"><?php echo $cat['name'] ?></span>
							</a>
						</li>
						<li class="block-brands__divider" role="presentation"></li>
						<?php endwhile; } ?>
					</ul>
				</div>
			</div>
			<div class="block-space block-space--layout--divider-nl d-xl-block d-none"></div>
			<div class="block block-products-columns">
				<div class="container">
					<div class="row">
					    <?php $sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Popular'");
							if($sql->num_rows>0){?>
						<div class="col-4">
							<div class="block-products-columns__title">Top Rated Products</div>

							<div class="block-products-columns__list ">
							<?php 
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Popular' ORDER BY id DESC LIMIT 3");
							if($sql->num_rows>0){
								while($row=$sql->fetch_assoc()):
									$product = $row['dpid'];
								
								?>
								<div class="block-products-columns__list-item">
									<div class="product-card">
										<div class="product-card__actions-list"><button
												class="product-card__action product-card__action--quickview"
												type="button" aria-label="Quick view"><svg width="16" height="16">
													<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button></div>
										<div class="product-card__image">
												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
												</div>
										<div class="product-card__info">
											<div class="product-card__name">
												<div>
													<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
													</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
										</div>
										<div class="product-card__footer">
											<div class="product-card__prices">
											    <?php if($row['ddiscount'] !=''):?>
												<div class="product-card__price product-card__price--old">
														&#8358;<?php echo number_format($row['dprice']); ?>
													
												</div>
                                                <?php endif;?>
												<div class="product-card__price product-card__price--new " style="margin-left:4px">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<?php endwhile; }else{
									echo "<p class='text-danger'>No result found </p>";
								} ?>

							</div>
						</div>
						<?php }
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Special Offer'");
							if($sql->num_rows>0){?>
						<div class="col-4">
							<div class="block-products-columns__title">Special Offers</div>
							<div class="block-products-columns__list">

							<?php 
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Special Offer' ORDER BY id DESC LIMIT 3");
							if($sql->num_rows>0){
                                while($row=$sql->fetch_assoc()): $product=$row['dpid']; ?>
								<div class="block-products-columns__list-item">
									<div class="product-card">
										<div class="product-card__actions-list"><button
												class="product-card__action product-card__action--quickview"
												type="button" aria-label="Quick view"><svg width="16" height="16">
													<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button></div>
										<div class="product-card__image">
												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
												</div>
										<div class="product-card__info">
											<div class="product-card__name">
												<div>
													<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
													</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
										</div>
										<div class="product-card__footer">
											<div class="product-card__prices">
												<div class="product-card__price product-card__price--old">
														&#8358;<?php echo number_format($row['dprice']); ?>
													
												</div>

												<div class="product-card__price product-card__price--new " style="margin-left:4px">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<?php endwhile; }else{
									echo "<p class='text-danger'>No result found </p>";
								} ?>

								

							</div>
						</div>
						<?php } ?>
						<?php 
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Bestsellers'");
							if($sql->num_rows>0){?>
						<div class="col-4">
							<div class="block-products-columns__title">Bestsellers</div>
							<div class="block-products-columns__list">
							

							<?php 
							$sql = $conn->query("SELECT * FROM products WHERE ddisplay_opt='Bestsellers' ORDER BY id DESC LIMIT 3");
							if($sql->num_rows>0){
                                while($row=$sql->fetch_assoc()): $product=$row['dpid'] ?>
								<div class="block-products-columns__list-item">
									<div class="product-card">
										<div class="product-card__actions-list"><button
												class="product-card__action product-card__action--quickview"
												type="button" aria-label="Quick view"><svg width="16" height="16">
													<path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" /></svg></button></div>
										<div class="product-card__image">
												<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
													<img src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
												</a>
												</div>
										<div class="product-card__info">
											<div class="product-card__name">
												<div>
													<div class="product-card__badges">
															<?php if($row['ddisplay_opt2']=="New"){ ?>
															<div class="tag-badge tag-badge--new">new</div>
															<?php }elseif($row['ddisplay_opt2']=="Hot"){ ?>
															<div class="tag-badge tag-badge--hot">hot</div>
															<?php } ?>
													</div>
															<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
															<?php echo $row['dpname']; ?></a>
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
										</div>
										<div class="product-card__footer">
											<div class="product-card__prices">
												<div class="product-card__price product-card__price--old">
														&#8358;<?php echo number_format($row['dprice']); ?>
													
												</div>

												<div class="product-card__price product-card__price--new " style="margin-left:4px">
														&#8358;<?php echo number_format( discount($row['ddiscount'], $row['dprice'])); ?>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<?php endwhile; }else{
									echo "<p class='text-danger'>No result found </p>";
								} 
								
								
								?>


							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		<!-- site__footer -->
		<?php include("footer.php"); ?>
	</div><!-- site / end -->
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

	<?php
	if(isset($_SESSION['notification_session']) AND @$_SESSION['notification_session']=="on"){
		$con = $conn->query("SELECT * FROM `notifivcation` WHERE dstatus='active' ORDER BY RAND()");
		if($con->num_rows>0):
			?>
	<script>
		$(document).ready(function(){
			$("#notification").modal('show');
		})
	</script>
<?php endif; }?>
    
	<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notification </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
		<?php
		$con = $conn->query("SELECT * FROM `notifivcation` WHERE dstatus='active'  ORDER BY RAND()");
		if($con->num_rows>0):
			$not = $con->fetch_assoc();

			$now = date("Y-m-d");
			$setdate = date("Y-m-d", strtotime($not['dstart']));
			$end = date("Y-m-d", strtotime($not['dend']));
			if($now > $end){
				$notid = $conn->real_escape_string($not['notid']);
				$conn->query("UPDATE notifivcation SET dstatus='inactive' WHERE notid='$notid'");
			}
			//close notification if the set dat has passed
			if($setdate == $now || $now >= $setdate):

			if($not['dimg']!=''){
			?>			
			<p> <img style="max-width:100%" src="_slide_blog/<?php echo $not['dimg']; ?>"> </p>
			<?php } ?>
			<h4><?php echo $not['dtitle']; ?> </h4>
			<p>
			<?php echo $not['ddesc']; ?>
			</p>
			<?php if($not['durl']!=''){ ?>
			<a href="<?php echo $not['durl']; ?>" class="btn btn-primary">Learn More</a>
        	<?php } endif; endif; ?>
		<!-- <div class="box text-center"> <a href="#hide" class="btn btn-secondary ">Don't show me again</a>  </div> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" id="hideShow" type="button" data-dismiss="modals">Close</button>
          <!-- <div id="buttons">
          <button class="btn btn-primary"  name="requested" type="submit">Proceed</button>
          </div> -->
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>



<script>
$(document).ready(function(){


	var slideIndex = 0;
	owlPoor();

	function owlPoor(){
		var x = $('.owl-dot');
		slideIndex++;
		if (slideIndex > x.length) {slideIndex = 1}		
		x[slideIndex-1].click();
		setTimeout(owlPoor, 8000);
	}


	$(document).on("click","#hideShow",function(){
		$.ajax({
            url:"ajax-session.php",
            method:"POST",
            data:{removeSession:1},
            success:function(){
                $("#notification").modal('hide'); 
            }

        })
	})
})
</script>






</body>


</html>
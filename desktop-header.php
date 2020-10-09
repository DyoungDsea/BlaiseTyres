
<header class="site__header">
			<div class="header">
				<div class="header__megamenu-area megamenu-area"></div>
				<div class="header__topbar-classic-bg"></div>
				<div class="header__topbar-classic">
					<div class="row">
						<div class="col-md-6 bg-primarys" style="margin-top:8px; color:white">
						 <span > <i class="fas fa-envelope"></i> <?php echo $dcomm_email; ?></span> &nbsp;  &nbsp; &nbsp;
						 <span > <i class="fas fa-phone"></i> <?php echo $dcomm_phone; ?></span> 
						</div>

						<div class="col-md-6 bg-primarye" style="margin-top:5px; color:whites; text-align:right">
						<?php 
							if(isset($_SESSION['logged'])){?>
						 <span > <a class="topbar__links"  style="color:white; " href="dashboard">Dashboard</a></span> &nbsp; &nbsp;
						 <span > <a class="topbar__links"  style="color:white; " href="logout">Logout</a></span> 
							<?php }else{ ?>

								<span > <a class="topbar__links"  style="color:white; " href="signup">Sign Up</a></span> &nbsp; &nbsp;
								 <span > <a class="topbar__links"  style="color:white; " href="login">Login</a></span> 
						<?php	} ?>
						</div>
					</div>
					<!-- <div class="topbar topbar--classic">
							
						<div class="topbar__item-text"><a class="topbar__link" href="about-us">About Us</a></div>
						<div class="topbar__item-text"><a class="topbar__link" href="contact-us">Contacts</a>
						</div>
						
						<div class="topbar__item-text"><a class="topbar__link" href="track-order">Track Order</a>
						</div>
						<div class="topbar__item-spring"></div>
						
						
						<div class="topbar__menu">
							
							<button class="topbar__button topbar__button--has-arrow topbar__menu-button" type="button">
								<span class="topbar__button-label">Email:</span> 
								<span class="topbar__button-title"><?php //echo $dcomm_email; ?></span> 
							</button>
						</div>
					</div> -->
				</div>
				<div class="header__navbar">
					
					<div class="header__navbar-menu">
						<div class="main-menu">
							<ul class="main-menu__list">
								
								<?php 
								$sw =$conn->query("SELECT * FROM `categories` WHERE status='active' ORDER BY name DESC"); 
								if($sw->num_rows>0){
									while($top=$sw->fetch_assoc()):
										$name=$conn->real_escape_string($top['name']);
								?>
                                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu" >
									<a href="shop-list?search=<?php echo $name; ?>"  class="main-menu__link" style="text-transform: uppercase !important;"><?php echo $name; ?>
									<?php 
                                            $jcats = mysqli_query($conn, "SELECT * FROM `sub_categories` where dcategory='$name' and status='active' order by name asc"); 
                                            if($jcats->num_rows>=1){ ?>
									<svg
											width="7px" height="5px">
											<path
												d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
											</svg>
											<?php } ?>
											</a>
                                                          <?php if($jcats->num_rows>=1){ ?>  
																<div class="main-menu__submenu">
															<ul class="menu">
																<?php while($jcrow = $jcats->fetch_assoc()) {
															?>
															<li class="menu__item"><a class="menu__link" href="shop-list?dcat=<?php echo $name; ?>&subcat=<?php echo $jcrow['name']; ?>"><?php echo $jcrow['name']; ?></a></li>
															<?php }  ?>
											</ul>
									</div>
									<?php	} ?>
                                </li>

								<?php endwhile; } ?>
								
							   
								<li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
										<a href="shop-list" class="main-menu__link" style="text-transform: uppercase !important;">Shop <svg
											width="7px" height="5px">
											<path
												d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
											</svg>
										</a>
										
										<div class="main-menu__submenu">
											<ul class="menu">											
												<li class="menu__item"><a class="menu__link" href="shop-list">Shop List</a></li>                                                
												<li class="menu__item"><a class="menu__link" href="compare">Compare</a></li> 
											</ul>
										</div>
                                </li>
									
								
								
								<?php 
									if(isset($_SESSION['logged'])){?>
								<li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
									<a href="#account" class="main-menu__link" style="text-transform: uppercase !important;">Account<svg
											width="7px" height="5px">
											<path
												d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
											</svg></a>
																		
                                        <div class="main-menu__submenu">
											<ul class="menu">
												<li class="menu__item"><a class="menu__link" href="dashboard">Dashboard</a></li>
												<li class="menu__item"><a class="menu__link" href="wishlist">Wishlist</a></li>
												<li class="menu__item"><a class="menu__link" href="account-profile">Edit Profile</a></li>
												<li class="menu__item"><a class="menu__link" href="account-password">Change Password</a></li>
												<li class="menu__item"><a class="menu__link" href="logout">Logout </a></li>
												
											</ul>
									</div>
										
                                </li>
								<?php }?>
								<li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
									<a href="track-order" class="main-menu__link" style="text-transform: uppercase !important;">Track Order </a>								
                                </li>
                                <!-- <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
									<a href="contact-us" class="main-menu__link">Contact Us </a>								
                                </li> -->
							</ul>
						</div>
					</div>
					<!-- <div class="header__navbar-phone phone"><a href="#" class="phone__body">
							<div class="phone__title">Call Us:</div>
							<div class="phone__number"><?php //echo $dcomm_phone; ?></div>
						</a></div> -->
				</div>
				<div class="header__logo"><a href="home" class="logo">
						<div class="logo__slogan">Auto parts for Cars, trucks and motorcycles</div>
						<div class="logo__image">
							<img style="height:80px;" src="images/blaise.jpeg" alt="Site logo">
						</div>
					</a></div>
				<div class="header__search">
					<div class="search">
						
                        <?php //if($hidesearch==''){ ?>
                            <form action="shop-list" method="get" class="search__body">
                            <div class="search__shadow"></div>
                            <input class="search__input" type="text" name="search" value="<?php if(isset($_GET['search']))echo $_GET['search']; ?>"
                                required placeholder="Enter Keyword"> 
                        <button	class="search__button search__button--end" type="submit">
                            <span class="search__button-icon"><svg width="20" height="20">
										<path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" /></svg></span></button>
							<div class="search__box"></div>
							<div class="search__decor">
								<div class="search__decor-start"></div>
								<div class="search__decor-end"></div>
							</div>
                        </form> 
							   <?php //} ?>



					</div>
				</div>
				<div class="header__indicators">
					<?php 
						
					if(isset($_SESSION['logged'])){
						$id = $conn->real_escape_string($_SESSION["userid"]);
						$sl = $conn->query("SELECT * FROM login WHERE userid='$id'")->fetch_assoc();
						?>
					<div class="indicator indicator--trigger--click"><a href="account-login"
							class="indicator__button"><span class="indicator__icon"><svg width="32" height="32">
									<path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7	C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" /></svg>
							</span><span class="indicator__title">Hello, <?php echo $sl['dname']; ?></span> <span class="indicator__value">My
								Account</span></a>
						<div class="indicator__content">
							<div class="account-menu">
								
								<div class="account-menu__divider"></div>
								<ul class="account-menu__links">
									<li><a href="dashboard">Dashboard</a></li>									
									<li><a href="wishlist">Wishlist</a></li>
									<li><a href="account-profile">Edit Profile</a></li>
									<li><a href="account-password">Change Password</a></li>
									<li><a href="logout">Logout</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php }else{?>
						<div class="indicator indicator--trigger--click"><a href="account-login"
							class="indicator__button"><span class="indicator__icon"><svg width="32" height="32">
									<path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7	C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" /></svg>
							</span><span class="indicator__title">Hello, Login your account </span> <span class="indicator__value">My
								Account</span></a>
						
					</div>
					<?php } ?>
					<div class="indicator indicator--trigger--click">
						<a href="cart" class="indicator__button">
							<span class="indicator__icon">
								<svg width="32" height="32">
									<circle cx="10.5" cy="27.5" r="2.5" />
									<circle cx="23.5" cy="27.5" r="2.5" />
									<path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
								</svg> 
							<span class="indicator__counter ball">0</span> </span><span
								class="indicator__title">Shopping Cart</span> <span
								class="indicator__value" id="total">&#8358;0.00</span></a>
						<div class="indicator__content">
							<div class="dropcart">
								<ul class="dropcart__list" id="sub">
									
									<li class="dropcart__divider" role="presentation"></li>
									
								</ul>
								<div class="dropcart__actions" id="outl">
									<!-- <a href="cart" class="btn btn-secondary">View Cart</a> 
									<a href="checkout" class="btn btn-primary">Checkout</a> -->
								</div>
							</div>
						</div>
					</div>

					<div class="indicator indicator--trigger--click">
						<a href="cart" class="indicator__button">
							<span class="indicator__icon">
								<svg width="32" height="32">
									<circle cx="10.5" cy="27.5" r="2.5" />
									<circle cx="23.5" cy="27.5" r="2.5" />
									<path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
								</svg> 
							<span class="indicator__counter balls">0</span> </span><span
								class="indicator__title">Subscription Cart</span> <span
								class="indicator__value" id="totals">&#8358;0.00</span></a>
						<div class="indicator__content">
							<div class="dropcart">
								<ul class="dropcart__list" id="subs">
									
									
								</ul>
								<div class="dropcart__actions" id="outls">
									<!-- <a href="cart" class="btn btn-secondary">View Cart</a> 
									<a href="checkout" class="btn btn-primary">Checkout</a> -->
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</header><!-- site__header / end -->
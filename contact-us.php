
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
			<!-- <div class="block-map block">
				<div style="background-image:url(images/main.jpg);height:400px;background-position:center left;" class="block-map__body"></div>
			</div> -->
			<div class="block-header block-header--has-breadcrumb block-header--has-title">
				<div class="container">
					<div class="block-header__body">
						<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb__list">
								<li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
								<li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a
										href="index" class="breadcrumb__item-link">Home</a></li>
								
								<li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Contact us</span></li>
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title dodo">Contact Us</h1>
					</div>
				</div>
			</div>
			<div class="block">
				<div class="container container--max--lg">
					<div class="card">
						<div class="card-body card-body--padding--2">
							<div class="row">
								<?php
						if(isset($_SESSION['msg'])){ ?>
						<div class="col-md-12 text-center text-success">
						<h3><?php echo $_SESSION['msg']; ?></h3>
						</div>
						<?php }	else if(isset($_SESSION['msg2'])){ ?>
							<div class="col-md-12 text-center text-danger">
						<h3><?php echo $_SESSION['msg2']; ?></h3>
						</div>							
						<?php } ?>
						<div class="col-12 col-lg-6 pb-4 pb-lg-0">
									<div class="mr-1">
										<h4 class="contact-us__header card-title">Our Address</h4>
										<div class="contact-us__address">
											<p><?php echo $dcomm_address; ?><br>Email: <?php echo $dcomm_email; ?><br>Phone Number: <?php echo $dcomm_phone; ?></p>
											<p><strong>Opening Hours</strong><br>Monday to Friday: 8am-8pm<br>Saturday:
												8am-6pm<br>Sunday: 10am-4pm</p>
											<p><strong>Comment</strong><br>At <?php echo ucwords($nname); ?>, we want your tyres to arrive quickly and at the best delivery rate we can offer.Also feel free to reach us via our social media platforms.Stay in touch with us. 
											</p>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="ml-1">
										<h4 class="contact-us__header card-title">Leave us a Message</h4>
										<form action="postmail" method="post">
											<div class="form-row">
									<div class="form-group col-md-6">
										<label for="form-name">Your Name</label> 
										<input type="hidden" name="mailer" value="<?php echo $dcomm_email; ?>" class="form-control">
										<input type="text" name="name" class="form-control" placeholder="Your Name">
									</div>
										<div class="form-group col-md-6"><label for="form-email">Email</label>
											<input type="email" name="email" class="form-control"
												placeholder="Email Address"></div>
											</div>
											<div class="form-group"><label for="form-subject">Subject</label> <input
													type="text" name="subject" class="form-control"
													placeholder="Subject"></div>
											<div class="form-group"><label for="form-message">Message</label> <textarea
													name="message" class="form-control" rows="4"></textarea></div>
													<p>Verify that you're a human being <i style="font-weight:600; color:#f00"><?php echo $rand; ?></i></p>
                    <input type="hidden" required name="spam1" value="<?php echo $rand; ?>">
					<p><input required class="verify" type="text" id="verify" name="spam2" /></p>
											<button type="submit" class="btn btn-primary">Send Message</button>
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
<?php
unset($_SESSION['msg']);
unset($_SESSION['msg2']);
?>
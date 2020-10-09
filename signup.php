
<?php include 'head.php';
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    header("location: dashboard");
  }
   ?>

<body><!-- site -->
<div class="site"><!-- site__mobile-header --><!-- site__mobile-header / end --><!-- site__header --><!-- site__header / end --><!-- site__body -->

<?php include("mobile-header.php"); ?>
		<!-- site__header -->
        <?php include("desktop-header.php"); ?>
        
<div class="site__body">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--lg">
            <div class="row">
                

            <div class="col-md-2"></div>
            <div class="col-md-8 d-flex mt-4 mt-md-0">
                <div class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">Register</h3>
                        <form method="post" action="signup-process">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-name">Fullname</label>  
                                        <input id="signup-name" type="text" name="name" required class="form-control" placeholder="John Blacky">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-phone">Phone</label> 
                                        <input id="signup-phone" type="number" name="phone" required pattern="[0-9]" class="form-control" placeholder="08012345678">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="signup-email">Email address</label> 
                                        <input id="signup-email" type="email" name="email" required class="form-control" placeholder="youngblue@gmail.com">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-password">Password</label> 
                                        <input id="signup-password" name="pass" type="password" required class="form-control" placeholder="*************">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-password"> Confirm Password</label> 
                                        <input id="signup-password" name="cpass" type="password" required class="form-control" placeholder="*************">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="signup-password">Billing Address</label> 
                                        <textarea name="address" id="" rows="3" placeholder="Aso Rock Villa, Abuja" required class="form-control"></textarea>
                                        <input type="hidden" name="referrer"  value="<?php echo @$_SESSION['reff']; ?>" class="form-control" placeholder="Referrer">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="signup-password">Shipping Address</label> 
                                        <textarea name="shipping" id="" rows="3" placeholder="No 4 Toyin Street Ikeja, Lagos" required class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="signup-passwordx">Anti-spam code: <span style="font-size:22px" class="text-danger"><?php echo date("is") ?> </span></label> 
                                        <input id="signup-passwordx" name="hide" type="hidden"  value="<?php echo date("is") ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="signup-password" name="code" type="text" required class="form-control" placeholder="Enter anti-spam code here...">
                                    </div>
                                </div>
                                
                            </div>


                            
                            
                            
                            <div class="form-group mb-0">
                                <button type="submit" id="registers" name="log" class="btn btn-primary mt-3">Register</button>
                            </div>
                        </form>
                        <p class="mt-2">Don't have an account? <a href="login">Login</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div></div><!-- site__body / end --><!-- site__footer -->

    
<?php include("footer.php"); ?>
	<!-- site__footer / end -->
</div><!-- site / end --><!-- mobile-menu -->
<?php include("mobile-header2.php"); ?>
	
	<!-- mobile-menu / end --><!-- quickview-modal -->
	<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"></div><!-- quickview-modal / end --><!-- add-vehicle-modal -->
	
    
    <!-- vehicle-picker-modal / end --><!-- photoswipe --><div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>--> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div><!-- photoswipe / end --><!-- scripts -->
    
    <?php include("scripts.php"); ?>
 </body>
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/account-login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:11:51 GMT -->
</html>
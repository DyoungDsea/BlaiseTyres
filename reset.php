
<?php include 'head.php';
if(!isset($_GET['email']) && !isset($_GET["userid"])){
    header("location:login");
}
// session_start();
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
                <div class="col-md-3"></div>
                <div class="col-md-6 d-flex">
                    <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Password Reset</h3>
                            <form method="post" action="reset-process">
                                <input type="hidden" name="userid" value="<?php echo $_GET['userid'];?>">
                                <input type="hidden" name="email" value="<?php echo $_GET['email'];?>">
                                
                                <div class="form-group">
                                    <label for="signin-password">Password</label> 
                                    <input id="signin-password" name="pass" type="password" required class="form-control" placeholder="New Secret word"> 
                                   
                                </div>

                                <div class="form-group">
                                    <label for="signin-passwordc">Confrim Password</label> 
                                    <input id="signin-passwordc" name="cpass" disabled type="password" required class="form-control" placeholder="Confirm New Secret word">                                    
                                </div>
                                
                            <div class="form-group mb-0">
                                <button type="submit" name="log" disabled id="reset" class="btn btn-primary mt-3">Reset Password</button>
                            </div>
                        </form>
                        <p class="mt-2">Don't have an account? <a href="signup">Sign up</a> </p>
                    </div>
                </div>
            </div>

            
            <div class="col-md-3"></div>

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
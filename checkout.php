<?php include 'head.php'; 
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }
?>

<?php
	include 'track.php';
?>
<body><!-- site --><div class="site">
        <?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
        <!-- site__body -->
        <div class="site__body"><div class="block-header block-header--has-breadcrumb block-header--has-title"><div class="container"><div class="block-header__body"><nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb"><ol class="breadcrumb__list"><li class="breadcrumb__spaceship-safe-area" role="presentation"></li><li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="index-2.html" class="breadcrumb__item-link">Home</a></li><li class="breadcrumb__item breadcrumb__item--parent"><a href="#" class="breadcrumb__item-link">Checkout</a></li><li class="breadcrumb__title-safe-area" role="presentation"></li></ol></nav><h1 class="block-header__title">Checkout</h1></div></div></div>
        
        <div class="checkout block"><div class="container container--max--xl"><div class="row"><div class="col-12 mb-3"><div class="alert alert-lg alert-primary">Returning customer? <a href="login">Click here to login</a></div></div>
        
		<div class="col-lg-2"></div>
        <div class="col-12 col-lg-8 col-xl-8"><div class="card mb-lg-0">
        
        <div class="card-body card-body--padding--2"><h3 class="card-title">Cart Summary</h3>
            <div class="row">
                <div class="col-md-6">Delivery Area</div>
                <div class="col-md-6">
                    <select name="location" id="mySelects" class="form-control form-control-sm boxx">
                        <option value="">Choose Location</option>
                        <option value="Delivery Station">Pick up at our station</option>
                        <?php 
                        $sk = $conn->query("SELECT * FROM `ddelivery` WHERE status='active' AND dcategory='Delivery Area' ORDER BY dlocation");
                        if($sk->num_rows>0):
                            while($skk =$sk->fetch_assoc()):
                                echo '<option value="'.$skk['dprice'].'">'.$skk['dlocation'].'</option>';
                            endwhile;
                        endif;
                        ?>
                    </select>
                </div>

        
            </div>

            <div class="row mt-2" id="stationPick"> </div>

            <div class="row mt-3" id="stationPick">
                <div class="col-md-6">Delivery Charges</div>
                <div class="col-md-6" id="chargex">
                    &#8358;0.00
                </div>
            </div>

            <div class="row mt-3" id="stationPick">
                <div class="col-md-6">Total</div>
                <div class="col-md-6" id="topup">
                <?php
                    if(isset($_SESSION['coupon'])){
                        echo '&#8358;'.number_format($_SESSION['coupon'],2);
                    }else{
                        echo '&#8358;'.@number_format($_SESSION['cart-total'],2);
                    }
                ?>
                </div>
            </div>

       
       </div>
       
       <div class="card-divider"></div>
       
       
       <div class="card-body card-body--padding--2"><h3 class="card-title">Shipping Details</h3>
      
       <div class="form-group">
       <div class="form-check"><span class="input-check form-check-input"><span class="input-check__body">
       <input class="input-check__input" checked type="checkbox" id="default"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><label class="form-check-label" for="default">Use your shipping Default address</label></div>

       
       <div class="form-check mt-3"><span class="input-check form-check-input"><span class="input-check__body">
       <input class="input-check__input" type="checkbox" id="newAddress"> <span class="input-check__box"></span> <span class="input-check__icon"><svg width="9px" height="7px"><path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/></svg> </span></span></span><label class="form-check-label" for="newAddress">Ship to a different address?</label></div>
       
       </div>
       <div class="blaise-form">
            <div class="form-group">
            <label for="checkout-comment">Shipping Address<span class="text-muted"></span></label> 
            <textarea id="checkout-comment" class="form-control" rows="4"></textarea>
            </div>
       </div>

       
       </div>

       <div class="card-divider"></div>
       <div id="page" class="">
									

        </div>
       </div></div>
       
       </div></div></div><div class="block-space block-space--layout--before-footer"></div></div><!-- site__body / end --><!-- site__footer -->
        
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



    <script>
    $(document).ready(function(){
        $(document).on("click","#newAddress",function(){
           $(".blaise-form").toggle();
           $("#default").prop("checked", false);
        });

        $(document).on("click","#default",function(){
           $(".blaise-form").css('display','none');
           $("#newAddress").prop("checked", false);
        });
    })
    </script>
 </body>
</html>
<?php include("head.php"); ?>

<body><!-- site -->
    <div class="site"><!-- site__mobile-header -->
    <?php include("mobile-header.php"); ?>
		<!-- site__header -->
        <?php include("desktop-header.php"); 
        
        $id = $_GET['id'];
        $blog= $conn->query("SELECT * FROM dblog WHERE dblog_id='$id' ORDER BY id DESC LIMIT 10");
        if($blog->num_rows>0):
            $row = $blog->fetch_assoc();
        ?>
		<!-- site__body -->
		

     <div class="site__body"><div class="block post-view"><div class="post-view__header post-header post-header--has-image"><div class="post-header__image" style="background-image: url('images/posts/post-1-1903x500.jpg');"></div><div class="post-header__body">
            <div class="post-header__categories">
                <ul class="post-header__categories-list">
                    <li class="post-header__categories-item"><a href="#" class="post-header__categories-link">Latest News</a></li>
                </ul>
            </div><h1 class="post-header__title"><?php echo $row['dtitle'] ?></h1>
        </div><div class="decor post-header__decor decor--type--bottom"><div class="decor__body"><div class="decor__start"></div><div class="decor__end"></div><div class="decor__center"></div></div></div></div>
        
        <div class="container"><div class="post-view__body">
            <div class="post-view__item post-view__item-post">
            <div class="post-view__card post">
                <div class="post__body typography">
                   
                    <figure><a href="#"><img src="_slide_blog/<?php echo $row['dimg'] ?>" alt=""></a> </figure>
                    <p style="word-wrap:break-word !important;">
                       <?php echo $row['ddesc'] ?>
                    </p>
    </div>
</div>


</div></div></div></div>
<div class="block-space block-space--layout--before-footer"></div>

</div>
        <?php endif;?>
<!-- site__body / end --><!-- site__footer -->

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

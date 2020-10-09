<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from red-parts.themeforest.scompiler.ru/themes/red-ltr/account-orders by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 23:12:30 GMT -->


<?php include 'head.php';

if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
	header("location: login");
}

?>
<body><!-- site -->

<div class="site">
		<?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>

		
	
		<!-- site__body -->
		<div class="site__body">
			<div class="block-space block-space--layout--after-header"></div>
			<div class="block">
				<div class="container container--max--xl">
					<div class="row">
						<div class="col-12 col-lg-3 d-flex">
							<div class="account-nav flex-grow-1">
								<h4 class="account-nav__title">Navigation</h4>
								<?php include 'link.php'; ?>
							</div>
						</div>
                        <?php
                        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                                } 
                                $total_records_per_page = 30;

                            ?>
						<div class="col-12 col-lg-9 mt-4 mt-lg-0">
							<div class="card">
								<div class="card-header">
									<h5>Payment History</h5>
								</div>
								<div class="card-divider"></div>
								<div class="card-table">
									<div class="table-responsive-sm">
										<table>
											<thead>
												<tr>
													<th>Order ID</th>
													<th>Product Name</th>
													<th>Amount Paid</th>
													<th>Date &amp; Time</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
                                                $uid= $conn->real_escape_string($_SESSION['userid']);
                                                if(isset($_GET["transaction_id"])){
                                                    $trans = $_GET["transaction_id"];
                                                    $sqls = $conn->query("SELECT * FROM history WHERE userid='$uid' AND dpid='$trans' ORDER BY id DESC");
                                                    $total_records =$sqls->num_rows;
                                                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                    $start_from = ($page_no - 1) * $total_records_per_page;
                                                    $s=$conn->query("SELECT * FROM history WHERE userid='$uid' AND dpid='$trans' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");

                                                }else{                             
                                                $sqls = $conn->query("SELECT * FROM history WHERE userid='$uid' ORDER BY id DESC");
                                                $total_records =$sqls->num_rows;
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $start_from = ($page_no - 1) * $total_records_per_page;
                                                $s=$conn->query("SELECT * FROM history WHERE userid='$uid' ORDER BY id DESC LIMIT $start_from, $total_records_per_page");
                                                }
                                                if($s->num_rows>0){
                                                    while($r=$s->fetch_assoc()){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $r['orderid']?></td>
                                                            <td><?php echo $r['pname'];?></td>
                                                            <td>&#8358;<?php echo number_format($r['amt_paid'])?></td>
                                                            <td><?php echo date("d M Y h:i:s",strtotime($r['ddate']))?></td>
                                                        </tr>
                                                        
                                                    <?php
                                                    }
                                                }else{
                                                    echo '<tr><td colspan="5" class="text-danger">No result found</td></tr>';
                                                }
												?>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-divider"></div>
								<div class="card-footer">
									<ul class="pagination">
                                    <?php 
                                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){ 
                                            echo "<li  class='page-item '><a class='page-link' href='?page_no=$counter' style='color:#0088cc;'>$counter</a></li>"; 
                                        
                                        }
                                    ?>
									</ul>
								</div>
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
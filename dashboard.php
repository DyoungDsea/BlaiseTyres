
<?php include 'head.php'; 
    if (!isset($_SESSION['logged']) && $_SESSION['logged'] !== true) {
        header("location: login");
    }
?>
<body><!-- site --><div class="site"><!-- site__mobile-header -->
<!-- site__mobile-header / end --><!-- site__header -->

        <?php include("mobile-header.php"); ?>
		<!-- site__header -->
		<?php include("desktop-header.php"); ?>
<!-- site__header / end --><!-- site__body -->
<div class="site__body"><div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            <div class="col-12 col-lg-3 d-flex">
                <div class="account-nav flex-grow-1">
                    <h4 class="account-nav__title">Navigation</h4>
                    <?php include 'link.php'; ?>
                </div>
            </div>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="dashboard">
                    <div class="dashboard__profile card profile-card">
                        <div class="card-body profile-card__body">
                            <div class="profile-card__avatar">
                            <div class="addresses-list__plus"></div>
                            </div>
                            <div class="profile-card__name"><?php echo $sl['dname']; ?></div>
                            <div class="profile-card__email"><?php echo $sl['demail']; ?></div>
                            <div class="address-card__row">
                                <div class="address-card__row-content">Wallet Balance: &#8358;<?php if($sl['dwallet']==0){echo '0.00';}else{echo number_format($sl['dwallet'],2);}; ?></div>
                            </div>
                            <div class="profile-card__email bg-primarys" style=" text-align:center">
                                Referral Link
                                <a  href="http://blaisetyres.com?referral_id=<?php echo $sl['userid']; ?>">
                                http://blaisetyres.com?referral_id=<?php echo $sl['userid']; ?>
                                </a>
                            </div>
                            <div class="profile-card__edit">
                                <a href="account-profile" class="btn btn-secondary btn-sm">Edit Profile</a>
                                <!-- <a href="#" class="btn btn-secondary btn-sm">Request for withdrawal</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__address card address-card address-card--featured">
                        <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                        <div class="address-card__body"><div class="address-card__name">Shipping Address</div>
                        <div class="address-card__row">
                        <?php 
                        $users = $conn->real_escape_string($_SESSION['userid']);
                        $kip = $conn->query("SELECT * FROM dship_address WHERE userid='$users' AND dstatus='yes'")->fetch_assoc();
                        
                        echo @$kip['daddress']; ?>
                        <p>
                            <a href="account-shipping-address" >View Shipping Address</a>
                        </p>
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Phone Number</div>
                            <div class="address-card__row-content"><?php echo $sl['dphone']; ?></div>
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Email Address</div>
                            <div class="address-card__row-content"><?php echo $sl['demail']; ?></div>
                        </div>
                        <div class="address-card__footer">
                            <a href="#edit-address" data-toggle="modal" data-target="#exampleModal">Edit Billing Address</a>
                            
                        </div>
                        <div class="profile-card__edit" style="margin-top:20px">
                            <!-- <a href="account-profile" class="btn btn-secondary btn-sm">Edit Profile</a> -->
                            <a href="#" data-toggle="modal" data-target="#payout" class="btn btn-secondary btn-sm">Request for withdrawal</a>
                        </div>
                    </div>
                </div>
                <div class="dashboard__orders card">
                    <div class="card-header">
                        <h5>Recent Orders</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-table">
                        <div class="table-responsive-sm">
                        <table> 
											<thead>
												<tr>
													<th>Date Order</th>
													<th>Order ID</th>
													<th>Payment Status</th>
													<th>Status</th>
													<th>---</th>
												</tr>
											</thead>
											<tbody>
                                            <?php

                                                
                                                $poo = $conn->query("SELECT * FROM `dcart_holder` WHERE userid='$id' AND orderid !='' ORDER BY id DESC LIMIT 2");
                                                if($poo->num_rows>0){
                                                    while($row = $poo->fetch_assoc()):
                                                ?>
												<tr>
													<td><?php echo date("d M Y", strtotime($row['created_date'])); ?></td>
													<td><?php echo $row['orderid']; ?></td>

													                                                    
													<td> <?php echo  ucfirst($row['payment_status'])  ?></td>
													<td><?php echo $row['dstatus']; ?></td>
													<td>
                                                    
                                                    <a href="cart-payment-detail?orderid=<?php echo $row['orderid']; ?>&date=<?php echo date("d M Y", strtotime($row['created_date'])); ?>" class="btn-sm btn-info btn">Details</a>
                                                    
                                                    
                                                    </td>
												</tr>
                                                    <?php endwhile; }else{
                                                    echo '<tr><td colspan="5">No result found</td></tr>';
                                                }  ?>
												
											</tbody>
										</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="address" method="post">
            <div class="group-form">
                <textarea id=""  name="add" required rows="5" class="form-control"><?php echo $sl['daddress']; ?></textarea>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="log" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>





    
<div class="modal fade" id="payout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Fill the form below </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="payout" method="post">
            <div class="form-group">
            <input type="hidden" name="hid" id="userId" value="<?php echo $sl['userid']; ?>">
            <!-- <label for="">Full Name</label> -->
                <input type="hidden" required name="name"  value="<?php echo $sl['dname']; ?>" id="" class="form-control">
                <input type="hidden" required name="wallet"  value="<?php echo $sl['dwallet']; ?>" id="" class="form-control">
            
            </div>
            <div class="form-group">
            <label for="">Bank Name</label>
            <input type="text" name="bank" placeholder="UBA, First Bank..." required class="form-control">
            </div>
            
            <div class="form-group">
            <label for="">Account Name</label>
            <input type="text" name="bank_name" required class="form-control">
            </div>
            <div class="form-group">
            <label for="">Account Number </label>
            <input type="number" name="bank_account" pattern="[0-9]" required class="form-control">
            </div>
            <div class="form-group">
            <label for="">Amount request for</label>
                <input type="number" required name="num" pattern="[0-9]" value="<?php echo $sl['dwallet']; ?>" id="requested" class="form-control">
                <span id="result-reqs" class="text-danger"></span>
            </div>
            <div class="form-group">
            <label for="">Password</label>
            <label for=""></label>
                <input type="password" required name="pass" id="" class="form-control">
            </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <div id="buttons">
          <button class="btn btn-primary"  name="requested" type="submit">Proceed</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>





 </body>
</html>
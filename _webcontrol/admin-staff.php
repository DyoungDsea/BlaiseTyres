 
     
     
      <ul class="sidebar navbar-nav" style="min-height:695px;">
    <div style="position:fixedx;margin-top:75px;">
      <li class="nav-item ">
        <a class="nav-link" href="index" >
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>     
      
      
      <?php if(in_array('Customers', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="accounts">Manage Customers <i class="fa fa-address-book"></i></a>
      </li>
    <?php } ?>
      <?php if(in_array('Product', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="products">Manage Products <i class="fas fa-circle-notch"></i></a>
      </li>
    <?php } ?>

    <?php if(in_array('Orders', $explode)){?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Manage Orders</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="pay-on-delivery">Pay on Delivery</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="orders">Pending Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="processed">Processed Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="shipped">Shipped Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="delivered">Delivered Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="returned">Returned Orders
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cancelled">Cancelled Orders</a>
         </a>
          
        </div>
      </li>
      <?php } ?>

      <?php if(in_array('Subscription', $explode)){?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-store"></i>
          <span style="font-size:15px">Manage Subscriptions</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="sub-inactive">Pending Approval</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-pending">Active Subscriptions</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-pending-a">Pending Subscriptions</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-fulfilled">Processed Subscriptions</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-shipped">Ship Subscriptions</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-allocated">Delivered Properties</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sub-cancel">Cancelled Subscriptions</a>
          
        </div>
      </li>
      <?php } ?>

      <?php if(in_array('Category', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="categories"> <i class="fa fa-tag"></i>Manage Categories</a>
      </li>
      <?php } ?>

      <?php if(in_array('Sub Category', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="sub-categories"> <i class="fa fa-tag"></i>Manage Sub Categories</a>
      </li>
      <?php } ?>

      <?php if(in_array('Brand', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="brands"> <i class="fa fa-tag"></i>Manage Brands</a>
      </li>
    <?php } ?>

    <?php if(in_array('Withdrawals', $explode)){?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Manage Withdrawals </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" target="_blank" href="pending-payment">Pending Request </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" target="_blank" href="paid-payment">Paid Withdrawals</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" target="_blank" href="can-payment">Cancelled Request</a>
        </div>
      </li>

      <?php } ?>

      <?php if(in_array('Blog', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="blog"><i class="fas fa-cog"></i> Manage Blog</a>
      </li>

      <?php } ?>

      <?php if(in_array('Star Rating', $explode)){?>
      <li class="nav-item">
        <a class="nav-link" href="star-rating"><i class="fas fa-cog"></i> Manage Star Rating</a>
      </li>

      <?php } ?>
      
      <li class="nav-item">
          <a class="nav-link" style="cursor:pointer;" data-toggle="modal" data-target="#logout">Logout <i class="fa fa-stopwatch"></i></a>
        </li>
        </div>
    </ul>
    
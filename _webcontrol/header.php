<?php

require("../conn.php");
if(!isset($_SESSION['logged_']) && $_SESSION['logged_'] !=true){
  header("Location: ../login");
}
$_GET['page']=(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
?>
<?php
//  if(!loggedIn()){
//      header("Location: logout");
//  }else{
//   if(detail('privilege')=="user"){
//     header("Location: ../dashboard/index");
// }
//  }
 ?>
<nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">

    <a class="navbar-brand mr-1" href="index">Blaise Autocare</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0 " id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->
    <?php 
$admin = $conn->real_escape_string($_SESSION['admin']);
$fp = $conn->query("SELECT * FROM `_security` WHERE userid = '$admin' ");
if($fp->num_rows>0){
  $r = $fp->fetch_assoc();
}
?>
<div class="ml-auto"></div>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 justify-content-endx">
        <li style="color:white;font-size:15px;padding-top:5px;"><?php echo ucwords($r['uname']); ?> </li>
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#edit-profile">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#pass">Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logout">Logout</a>
        </div>
      </li>
    </ul>

    <a href="../home" target="_blank" class="btn btn-outline-light btn-sm">View Site</a>

  </nav>
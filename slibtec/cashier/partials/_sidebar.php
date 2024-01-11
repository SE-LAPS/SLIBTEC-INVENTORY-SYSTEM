<!DOCTYPE html>
<html>
<head>
<style>
    /* Custom CSS for the navigation bar */
    .custom-navbar {
      background-color: #182B29; /* Dark black background color */
      /* color: #fff !important; White font color */
    }
    .yellow-icon {
      color: yellow !important;
    }
    .orange-icon {
      color: orange !important;
    }
    .center-image {
      display: flex;
      align-items: center;
    }
    .navbar-nav .nav-link {
  color: #fff;
  transition: background-color 0.5s, color 0.5s;
  display: block;
  padding: 10px;
  text-decoration: none;
}

.navbar-nav .nav-link:hover {
  background-color: burlywood; /* Change this to your desired hover color */
}

.navbar-nav .nav-link.active,
.navbar-nav .nav-link:active {
  background-color: #555; /* Change this to your desired active/click color */
}

/* Optional: Add a smooth transition for the icon */
.navbar-nav .nav-link i {
  transition: transform 0.5s;
}

.navbar-nav .nav-link:hover i {
  transform: scale(1.4); /* Change this to your desired hover effect on the icon */
}

/* Dropdown styles */
.dropdown-btn {
  padding: 10px; /* Adjust the padding to your desired value */
  background-color: #182B29;
  color: #fff;
  border: none;
  text-align: left;
  padding-left: 24px;
  cursor: pointer;
  display: block;
  width: 100%; /* Ensure the button takes the full width */
}

.dropdown-container {
  display: none;
  padding-left: 20px;
  background-color: #182B29;
  text-align: left;
  margin: 0; /* Remove any default margin */
}

.nav-item{
  font-size: 15px;
  
}

.dropdown-container a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 15px; /* Adjust the padding to your desired value */
  transition: background-color 0.5s;
}
  </style>
</head>
<body>


<?php
$staff_id = $_SESSION['staff_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  rpos_staff  WHERE staff_id = '$staff_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($staff_id = $res->fetch_object()) {

?>
 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light custom-navbar" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
        <img src="../admin/assets/img/brand/Logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="../admin/assets/img/brand/1.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php" style="color: #fff;">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customes.php" style="color: #fff;">
              <i class="fas fa-users text-primary"></i> Staff Members
            </a>
          </li>
     <?php include 'script.php'; ?>


           <li class="nav-item">
        <button class="dropdown-btn">
            <i class="fas fa-store text-primary" style="margin-right: 14px;"></i>
            Stores
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container" aria-labelledby="storesDropdown">
          <a class="nav-link" href="products.php" style="color: #fff;"><i class="fas fa-dolly-flatbed text-primary"></i>Consumables Store</a>
            <a class="nav-link" href="payments.php" style="color: #fff;"><i class="fas fa-exclamation-triangle text-primary"></i>Chemicals Store</a>      
    </li>

           <li class="nav-item">
            <button class="dropdown-btn">
            <i class="fas fa-caret-square-right text-primary" style="margin-right: 18px;"></i>
           Request Stores 
            <i class="fa fa-caret-down"></i>
        </button>
             <div class="dropdown-container" aria-labelledby="storesDropdown">
            <a class="nav-link" href="payment1.php" style="color: #fff;"><i class="fas fa-dolly-flatbed text-primary"></i>Consumables</a>
            <a class="nav-link" href="payment2.php" style="color: #fff;"><i class="fas fa-exclamation-triangle text-primary"></i>Chemicals</a>
           
        </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="receipts.php" style="color: #fff;">
              <i class="fas fa-file-invoice-dollar text-primary"></i> Invoices
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted" style="color: #fff;">Reporting</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="orders_reports.php" style="color: #fff;">
            <i class="fas fa-shopping-basket yellow-icon"></i> Inventory Records
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payments_reports.php" style="color: #fff;">
            <i class="fas fa-funnel-dollar yellow-icon"></i> Invoice Records
            </a>
          </li>
           <li class="nav-item">
          <a class="nav-link" href="help.php" style="color: #fff;">
          <i class="fas fa-hand-holding-heart yellow-icon"></i> Help Desk         
          </a>
        </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="logout.php" style="color: #fff;">
            <i class="fas fa-sign-out-alt orange-icon"></i> Log Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php } ?>
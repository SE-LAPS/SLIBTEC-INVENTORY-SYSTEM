<?php
session_start();
include('config/config.php');
//login 
if (isset($_POST['login'])) {
    $hr_email = $_POST['hr_email'];
    $hr_password = sha1(md5($_POST['hr_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT hr_email, hr_password, hrd_id  FROM  rpos_hr WHERE (hr_email =? AND hr_password =?)"); //sql to log in hr
    $stmt->bind_param('ss',  $hr_email, $hr_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($hr_email, $hr_password, $hrd_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['hrd_id'] = $hrd_id;
    if ($rs) {
        //if its sucessfull
        header("location:dashboard.php");
    } else {
        $err = "Incorrect Authentication Credentials ";
    }
}
require_once('partials/_head.php');
?>

<!DOCTYPE html>
<html>
<head>
  <style>
 
    .custom-login {
      background-image: url('assets/theme/2.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: #ffffff; 
      min-height: 100vh; 
    }
  </style>
</head>

<body class="custom-login">
    <div class="main-content">
        <div class="header bg-gradient-primar py-7">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                           <h1 class="text-white">SLIBTEC - Sri Lanka Institute of Biotechnology<br>HR Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form method="post" role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" required name="hr_email" placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" required name="hr_password" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="text-left">
                                        <button type="submit" name="login" class="btn btn-warning btn-lg my-4" style="width: 350px;" >Log In</button>
                                        <a href="create_account.php" class=" btn btn-success" style="width: 350px;">Create Account</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <!-- <a href="../admin/forgot_pwd.php" target="_blank" class="text-light"><small>Forgot password?</small></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>
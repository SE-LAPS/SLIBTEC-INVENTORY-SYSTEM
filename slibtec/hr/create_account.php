<?php
session_start();
include('config/config.php');

// Create account
if (isset($_POST['addHr'])) {
    // Prevent Posting Blank Values
    if (empty($_POST["hr_phoneno"]) || empty($_POST["hr_name"]) || empty($_POST['hr_email']) || empty($_POST['hr_password'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $hr_name = $_POST['hr_name'];
        $hr_phoneno = $_POST['hr_phoneno'];
        $hr_email = $_POST['hr_email'];
        $hr_password = sha1(md5($_POST['hr_password'])); // Hash This 
        $hrd_id = $_POST['hrd_id'];

        // Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_hr (hrd_id, hr_name, hr_phoneno, hr_email, hr_password) VALUES(?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);

        // Bind parameters
        $rc = $postStmt->bind_param('sssss', $hrd_id, $hr_name, $hr_phoneno, $hr_email, $hr_password);

        // Execute the statement
        $postStmt->execute();

        // Declare a variable which will be passed to the alert function
        if ($postStmt) {
            $success = "HR Account Created";
            header("refresh:1; url=index.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
}


require_once('partials/_head.php');
require_once('config/code-generator.php');
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
                            < <h1 class="text-white">SLIBTEC - Sri Lanka Institute of Biotechnology<br>HR Login</h1>
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
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control" required name="hr_name" placeholder="Full Name" type="text">
                                        <input class="form-control" value="<?php echo $hrs_id;?>" required name="hrd_id"  type="hidden">

                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input class="form-control" required name="hr_phoneno" placeholder="Phone Number" type="text">
                                    </div>
                                </div>
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

                                <div class="text-center">
                                </div>
                                <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" name="login" class="btn btn-warning btn-lg  my-4" style="width: 350px;" >Log In</button>
                                     <button type="submit" name="addHr" class="btn btn-success pull-right my-1" style="width: 350px;">Create Account</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="../admin/forgot_pwd.php" target="_blank" class="text-light"><small>Forgot password?</small></a>
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
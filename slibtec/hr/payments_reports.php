<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>

<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(../admin/assets/img/theme/1.png); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            Invoice Records
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Product Description</th>
                                        <th scope="col">Product Type</th>
                                        <th class="text-success" scope="col">Product Code</th>
                                        <th scope="col">Amount</th>
                                        <th class="text-success" scope="col">Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['hr_id'])) {
                                     $hr_id = $_SESSION['hr_id'];
                                     $ret = "SELECT * FROM  rpos_payments WHERE hr_id ='$hr_id' ORDER BY `created_at` DESC ";
                                     $stmt = $mysqli->prepare($ret);
                                     $stmt->execute();

                                        $res = $stmt->get_result();
                                        while ($payment = $res->fetch_object()) {
                                    ?>
                                            <tr>
                                                <td class="text-success" scope="row">
                                                    <?php echo $payment->pay_code; ?>
                                                </td>
                                                <td scope="row">
                                                    <?php echo $payment->pay_method; ?>
                                                </td>
                                                <td class="text-success">
                                                    <?php echo $payment->order_code; ?>
                                                </td>
                                                <td>
                                                    Rs. <?php echo $payment->pay_amt; ?>
                                                </td>
                                                <td class="text-success">
                                                    <?php echo date('d/M/Y g:i', strtotime($payment->created_at)) ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "Error: 'hr_id' is not set in the session.";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>
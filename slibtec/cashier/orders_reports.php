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
        <div style="background-image: url(../admin/assets/img/theme/bk1.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
                            Inventory Records
                        </div>
                        <div class="table-responsive">
                           <table class="table table-bordered" > 
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">Product Code</th>
                                        <th scope="col">Requester</th>
                                        <th class="text-success" scope="col">Product Description</th>
                                        <th class="text-success" scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        
                                        <th scope="col">Total Price</th>
                                        <th scop="col">Status</th>
                                        <th scop="col"><b>Result</b></th>
                                        <th class="text-success" scope="col">Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  rpos_orders ORDER BY `created_at` DESC  ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($order = $res->fetch_object()) {
                                        $total = ($order->prod_price * $order->prod_qty);

                                    ?>
                                        <tr>
                                            <th class="text-success" scope="row"><?php echo $order->order_code; ?></th>
                                            <td><?php echo $order->customer_name; ?></td>
                                            <td class="text-success"><?php echo $order->prod_name; ?></td>
                                             <td class="text-success"><?php echo $order->prod_qty; ?></td>
                                            <td>Rs: <?php echo $order->prod_price; ?></td>
                                           
                                            <td>Rs: <?php echo $total; ?></td>
                                            <td><?php if ($order->order_status == '') {
                                                    echo "<span class='badge badge-danger'>Consumables</span>";
                                                } else {
                                                    echo "<span class='badge badge-success'>Chemicals</span>";
                                                } ?></td>
                                                 <!-- Order Result -->
                           <td><?php if ($order->order_status == '') {
                            echo "<span class='badge badge-danger'>Pending</span>";
                          } else {
                            echo "<span class='badge badge-success'>Accepted</span>";
                          } ?></td>
                                            <td class="text-success"><?php echo date('d/M/Y g:i', strtotime($order->created_at)); ?></td>
                                        </tr>
                                    <?php } ?>
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
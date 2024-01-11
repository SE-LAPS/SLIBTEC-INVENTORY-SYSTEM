<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

// Update prod_REQty, prod_GRNQty, prod_GINAmount, prod_GRNAmount, prod_REAmount
$updateQuery = "UPDATE rpos_products
                SET 
                    prod_REQty = IFNULL(rpos_products.prod_GINQty, 0) - IFNULL(
                        (SELECT SUM(rpos_orders.prod_qty) FROM rpos_orders WHERE rpos_orders.prod_id = rpos_products.prod_id),
                        0
                    ),
                    prod_GRNQty = IFNULL((SELECT SUM(rpos_orders.prod_qty) FROM rpos_orders WHERE rpos_orders.prod_id = rpos_products.prod_id), 0),
                    prod_GINAmount = (IFNULL(rpos_products.prod_GINQty, 0) - IFNULL(
                        (SELECT SUM(rpos_orders.prod_qty) FROM rpos_orders WHERE rpos_orders.prod_id = rpos_products.prod_id),
                        0
                    )) * rpos_products.prod_price,
                    prod_GRNAmount = IFNULL((SELECT SUM(rpos_orders.prod_qty) FROM rpos_orders WHERE rpos_orders.prod_id = rpos_products.prod_id), 0) * rpos_products.prod_price,
                    prod_REAmount = IFNULL(rpos_products.prod_REQty, 0) * rpos_products.prod_price
                WHERE prod_id IN (SELECT DISTINCT prod_id FROM rpos_orders)";
$stmtUpdate = $mysqli->prepare($updateQuery);

if ($stmtUpdate === false) {
    die('Error: ' . htmlspecialchars($mysqli->error));
}

if (!$stmtUpdate->execute()) {
    die('Error: ' . htmlspecialchars($stmtUpdate->error));
}

$stmtUpdate->close();

// ... (rest of your code remains unchanged)


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM  rpos_products  WHERE  prod_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=products.php");
    } else {
        $err = "Try Again Later";
    }
}

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
    <div style="background-image: url(assets/img/theme/ex1.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
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
          
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Image</th>
                     <th scope="col">Product Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Location</th>
                    <th scope="col">Exp-Date</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">IN Qty</th>
                    <th scope="col">OUT Qty</th>
                    <th scope="col">Remaining Qty</th>
                    <th scope="col">IN Amount</th>
                    <th scope="col">OUT Amount</th>
                    <th scope="col">Remaining Amount</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_products ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td>
                        <?php
                        if ($prod->prod_img) {
                          echo "<img src='../admin/assets/img/products/$prod->prod_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='../admin/assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
                        }

                        ?>
                      </td>
                      <td><?php echo $prod->prod_code; ?></td>
                      <td><?php echo $prod->prod_name; ?></td>
                      
                      <td><?php echo $prod->prod_location; ?></td>
                      <td><?php echo $prod->prod_Exp_Date; ?></td>
                      <td> Rs:<?php echo $prod->prod_price; ?></td>
                      <td><?php echo $prod->prod_GINQty; ?></td>
                      <td> <?php echo $prod->prod_GRNQty; ?></td>
                      <td> <?php echo $prod->prod_REQty; ?></td>
                      <td><?php echo $prod->prod_GINAmount; ?></td>
                      <td> <?php echo $prod->prod_GRNAmount; ?></td>
                      <td> <?php echo $prod->prod_REAmount; ?></td>

                        <td>
                        <a href="make_oder.php?prod_id=<?php echo $prod->prod_id; ?>&prod_name=<?php echo $prod->prod_name; ?>&prod_price=<?php echo $prod->prod_price; ?>">
                     <button class="btn btn-sm btn-warning">
                    <i class="fas fa-cart-plus"></i>
                    Request
                   </button>
                  </a>

                      </td>
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
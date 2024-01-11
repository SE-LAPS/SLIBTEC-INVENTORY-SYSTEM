<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

// Update prod_REQty, prod_GRNQty, prod_GINAmount, prod_GRNAmount, prod_REAmount
$updateQuery = "UPDATE rpos_chemicals
                SET 
                    prod_REQty = IFNULL(rpos_chemicals.prod_GINQty, 0) - IFNULL(
                        (SELECT SUM(rpos_orders2.prod_qty) FROM rpos_orders2 WHERE rpos_orders2.prod_id = rpos_chemicals.prod_id),
                        0
                    ),
                    prod_GRNQty = IFNULL((SELECT SUM(rpos_orders2.prod_qty) FROM rpos_orders2 WHERE rpos_orders2.prod_id = rpos_chemicals.prod_id), 0),
                    prod_GINAmount = (IFNULL(rpos_chemicals.prod_GINQty, 0) - IFNULL(
                        (SELECT SUM(rpos_orders2.prod_qty) FROM rpos_orders2 WHERE rpos_orders2.prod_id = rpos_chemicals.prod_id),
                        0
                    )) * rpos_chemicals.prod_price,
                    prod_GRNAmount = IFNULL((SELECT SUM(rpos_orders2.prod_qty) FROM rpos_orders2 WHERE rpos_orders2.prod_id = rpos_chemicals.prod_id), 0) * rpos_chemicals.prod_price,
                    prod_REAmount = IFNULL(rpos_chemicals.prod_REQty, 0) * rpos_chemicals.prod_price
                WHERE prod_id IN (SELECT DISTINCT prod_id FROM rpos_orders2)";
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
    $adn = "DELETE FROM  rpos_chemicals  WHERE  prod_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=payments.php");
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
            <a href="add_chemicals.php" class="btn btn-outline-warning">
              <i class="fas fa-plus"></i> Add New Chemical
            </a>
           

<!-- Button to trigger QR Code scanning -->
<button class="btn btn-outline-success ml-2" id="scanQRCodeBtn">
    <i class="fas fa-qrcode"></i> Scan QR Code
</button>

<!--search item section-->
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Chemical Item Store</h3>
        </div>
        <div class="col-md-4 text-right">
            <form class="form-inline" method="GET" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Enter search keyword">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </form>
        </div>
    </div>
</div>


            </div>
            <div class="table-responsive">
              <table class="table table-bordered" > 
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Image</th>
                     <th scope="col">Product Code</th>
                    <th scope="col">Description</th>
                    <th scope="col">Location</th>
                    <th scope="col">Exp-Date</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">GIN Qty</th>
                    <th scope="col">GRN Qty</th>
                    <th scope="col">Remaining Qty</th>
                    <th scope="col">GIN Amount</th>
                    <th scope="col">GRN Amount</th>
                    <th scope="col">Remaining Amount</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_chemicals ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($prod = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td>
                        <?php
                        if ($prod->prod_img) {
                          echo "<img src='assets/img/products/$prod->prod_img' height='60' width='60 class='img-thumbnail'>";
                        } else {
                          echo "<img src='assets/img/products/default.jpg' height='60' width='60 class='img-thumbnail'>";
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
                        <a href="payments.php?delete=<?php echo $prod->prod_id; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>

                          
                        </a>
                        <a href="update_chemical.php?update=<?php echo $prod->prod_id; ?>">
                          <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                            Update
                          </button>
                        </a>

                         <a href="make_order2.php?prod_id=<?php echo $prod->prod_id; ?>&prod_name=<?php echo $prod->prod_name; ?>&prod_price=<?php echo $prod->prod_price; ?>">

                       
                    
                          <button class="btn btn-sm btn-warning">
                            <i class="fas fa-cart-plus"></i>
                            Request
                          </button>
                        </a>

                             <!-- Button to trigger the QR Code modal -->
<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#qrCodeModal<?php echo $prod->prod_id; ?>">
    <i class="fas fa-qrcode"></i> QR Code
</button>
                      <!-- Modal for QR Code -->
                            <div class="modal fade" id="qrCodeModal<?php echo $prod->prod_id; ?>" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrCodeModalLabel">QR Code</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- QR code image will be displayed here -->
                                            <?php
                                            $qrCodePath = $prod->prod_qr; // Assuming prod_qr is the column containing the QR code path
                                            if ($qrCodePath) {
                                                echo "<img id='qrCodeImage" . $prod->prod_id . "' src='assets/img/qr/$prod->prod_qr' height='400' width='450' class='img-thumbnail'>";
                                            } else {
                                                echo "QR Code not available.";
                                            }
                                            ?>
                                            <br><br>
                                            <!-- Button to print the QR code -->
                                            <center>
                                                <button class="btn btn-sm btn-primary" onclick="printQRCode('<?php echo $prod->prod_id; ?>')">
                                                    <i class="fas fa-print"></i> Print QR Code
                                                </button>
                                            </center>
                                            </div>
                                            </div>
                                            </div>
                                            </div>

                                            <script>
                                                // JavaScript to handle QR code printing
                                            function printQRCode(qrCodeId) {
                                                var qrCodeImage = document.getElementById('qrCodeImage' + qrCodeId);
                                                var qrCodePath = qrCodeImage.src;

                                                if (qrCodePath) {
                                                    var printWindow = window.open('', '_blank');
                                                    printWindow.document.write('<html><head><title>QR Code Print</title></head><body>');
                                                    printWindow.document.write('<img src="' + qrCodePath + '" width="100%" height="100%">');
                                                    printWindow.document.write('</body></html>');
                                                    printWindow.document.close();
                                                    printWindow.print();
                                                    printWindow.onafterprint = function () {
                                                        printWindow.close();
                                                    };
                                                } else {
                                                    alert('QR Code not available for printing.');
                                                }
                                            }
                                                </script>

                      

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
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
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('partials/_head.php'); ?>

    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-enQ42Mf8S8N6JocCd9l6ZOB9Dl6UqMs1lq3BqfT1lM7EAd7sE8Lw6Pa7/c2Rdkit"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-O5F2h3dJJvzZb4Z/nUyDKP1RrliJgkT6wrFOlVMWSKTjzq5A3BA/5U8NKMJ1zNq5"
        crossorigin="anonymous"></script>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha384-3fKbVRKpS/W+78M64hWB/RU5ip3YUcezG81fMMI4nA2XOF+qAOS1te2tJ4TA3spM"
        crossorigin="anonymous">

    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    

    <title>Your Page Title</title>

  
</head>

<body>
    <!-- Sidenav -->
    <?php require_once('partials/_sidebar.php'); ?>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php require_once('partials/_topnav.php'); ?>

        <!-- Header -->
        <div style="background-image: url(assets/img/theme/ex1.jpg); background-size: cover;"
            class="header pb-8 pt-5 pt-md-8">
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
                            <a href="add_product.php" class="btn btn-outline-warning">
                                <i class="fas fa-plus"></i> Add New Consumable
                            </a>


<!-- Button to trigger QR Code scanning -->
<button
 
class="btn btn-outline-success ml-2" id="scanQRCodeBtn">
        <i class="fas fa-qrcode"></i> Scan QR Code
    </button>

    <!--search item section-->

    <style>
        .search-container {
            position: relative;
            display: inline-block;
        }
        .search-bar {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .suggestions {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-height: 200px;
            overflow-y: auto;
            width: 300px;
        }
        .suggestions ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .suggestions li {
            padding: 5px;
            cursor: pointer;
        }
        .suggestions li:hover {
            background-color: #f2f2f2;
        }
    </style>

<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Consumables Item Store</h3>
        </div>
        <div class="col-md-4 text-right">
            
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search Here...">
             <div class="suggestions"></div>
        </div>
                <div class="search-results"></div>
        </div>
    </div>
</div>


 <?php include 'script.php'; ?>




                        </div>
                   <div class="table-responsive">
                           <table class="table table-bordered" > 
                               
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Product Description</th>
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

 <a href="products.php" data-toggle="modal" data-target="#deleteConfirmationModal<?php echo $prod->prod_id; ?>">
    <button class="btn btn-sm btn-danger">
        <i class="fas fa-trash"></i>
        Delete
    </button>
</a>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteConfirmationModal<?php echo $prod->prod_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="deleteBtn" data-dismiss="modal">Delete</button>
                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('deleteBtn').addEventListener('click', function() {
    // Perform the deletion action here
    window.location.href = "products.php?delete=<?php echo $prod->prod_id; ?>";
});
</script>


                                            <a href="update_product.php?update=<?php echo $prod->prod_id; ?>">
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                    Update
                                                </button>
                                            </a>

                                            <a href="make_oder.php?prod_id=<?php echo $prod->prod_id; ?>&prod_name=<?php echo $prod->prod_name; ?>&prod_price=<?php echo $prod->prod_price; ?>">
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
        </div>
        <!-- Footer -->
        <?php require_once('partials/_footer.php'); ?>
    </div>

    <!-- Argon Scripts -->
    <?php require_once('partials/_scripts.php'); ?>

    
</body>

</html>
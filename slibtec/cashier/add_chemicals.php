<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

if (isset($_POST['addProduct'])) {
    // Prevent Posting Blank Values
    if (empty($_POST["prod_code"]) || empty($_POST["prod_name"]) || empty($_POST['prod_desc']) || empty($_POST['prod_price'])) {
        $err = "Blank Values Not Accepted";
    } else {
    $prod_id = $_POST['prod_id'];
    $prod_code  = $_POST['prod_code'];
    $prod_name = $_POST['prod_name'];
    $prod_img = $_FILES['prod_img']['name'];
    move_uploaded_file($_FILES["prod_img"]["tmp_name"], "../admin/assets/img/products/" . $_FILES["prod_img"]["name"]);
    $prod_desc = $_POST['prod_desc'];
    $prod_price = $_POST['prod_price'];
    $prod_location = $_POST['prod_location'];
    $prod_Exp_Date = $_POST['prod_Exp_Date'];
    $prod_GINQty = $_POST['prod_GINQty'];
    
    
	//Visit codeastro.com for more projects
    //Insert Captured information to a database table
    // Adjust the number of placeholders and types in bind_param
    $postQuery = "INSERT INTO rpos_chemicals (prod_id, prod_code, prod_name, prod_img, prod_desc, prod_price, prod_location, prod_Exp_Date, prod_GINQty) VALUES(?,?,?,?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);

    // Update the bind_param to include all 11 placeholders
    $rc = $postStmt->bind_param('sssssssss', $prod_id, $prod_code, $prod_name, $prod_img, $prod_desc, $prod_price, $prod_location, $prod_Exp_Date, $prod_GINQty);

    $postStmt->execute();
    //declare a varible which will be passed to alert function
    // Update prod_REQty, prod_GRNQty, prod_GINAmount, prod_GRNAmount, prod_REAmount for the newly added product
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
    WHERE prod_id = ?";
$stmtUpdateNewProduct = $mysqli->prepare($updateQuery);

if ($stmtUpdateNewProduct === false) {
die('Error: ' . htmlspecialchars($mysqli->error));
}

$stmtUpdateNewProduct->bind_param('s', $prod_id);
$stmtUpdateNewProduct->execute();
$stmtUpdateNewProduct->close();

// Declare a variable which will be passed to alert function
if ($postStmt) {
$success = "Product Added" && header("refresh:1; url=add_chemicals.php");
} else {
$err = "Please Try Again Or Try Later";
}
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
              <h3>Please Fill All Fields</h3>
            </div>
            <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Product Description</label>
                    <input type="text" name="prod_name" class="form-control">
                    <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>Product Code</label>
                    <input type="text" name="prod_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control" value="">
                  </div>
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>Product Image</label>
                    <input type="file" name="prod_img" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Product QR Code</label>
                    <input type="file" name="prod_qr" class="btn btn-outline-success form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Unit Price</label>
                    <input type="text" name="prod_price" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Location</label>
                    <input type="text" name="prod_location" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>Exp-Date</label>
                    <input type="date" name="prod_Exp_Date" class="form-control" value="">
                  </div>
                  <div class="col-md-6">
                    <label>GINQty</label>
                    <input type="text" name="prod_GINQty" class="form-control" value="">
                  </div>
                  
                </div>
                <hr>
                <div class="form-row">
                  <div class="col-md-12">
                    <label>Product Description</label>
                    <textarea rows="5" name="prod_desc" class="form-control" value=""></textarea>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="submit" name="addProduct" value="Add Product" class="btn btn-success" value="">
                    <a href="payments.php" class="btn btn-secondary">Back</a>
                  </div>
                </div>
              </form>
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
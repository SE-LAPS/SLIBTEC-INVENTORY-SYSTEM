<?php
require 'vendor/autoload.php'; // Include Composer autoloader

use Endroid\QrCode\QrCode;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prodId = $_POST['prod_id'];

    // Fetch data from the database using $prodId and construct the data array
    $data = [
        'prod_id' => $prodId,
        // Add other data fields as needed
    ];

    // Generate QR code
    $qrCode = new QrCode(json_encode($data));

    // Save QR code as a file
    $filename = 'qrcodes/qr_code_' . $prodId . '.png';
    $qrCode->writeFile($filename);

    // Output the filename to be used in the response
    echo $filename;
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    header('Allow: POST');
    exit('Method Not Allowed');
}
?>

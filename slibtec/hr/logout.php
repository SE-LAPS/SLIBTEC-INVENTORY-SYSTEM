<?php
session_start();
unset($_SESSION['hr_id']);
session_destroy();
header("Location: ../../index.php");
exit;

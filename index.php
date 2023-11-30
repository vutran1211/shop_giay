<?php
session_start();
ob_start();
// đặt múi giờ mặc định
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once "./mvc/Bridge.php";
$myApp = new App();
?>
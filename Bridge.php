<?php
$arr_name_project = explode('/', $_SERVER['REQUEST_URI']);
define('_NAME_PROJECT', $arr_name_project[1]);
define('_WEB_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/'. _NAME_PROJECT);
define('_PATH_ROOT_PUBLIC', _WEB_ROOT . '/public');
define('_PATH_IMG_PUBLIC', _WEB_ROOT . '/public/client/assets/img/');
define('_VIEW_PATH' , __DIR__ . '/views');
define('_UPLOAD', $_SERVER['DOCUMENT_ROOT'] . '/'. _NAME_PROJECT . '/upload');
define('_PATH_AVATAR', _WEB_ROOT . '/upload/avt/');
define('_PUBLIC', _WEB_ROOT . '/public');
define('_PATH_IMG_PRODUCT', _WEB_ROOT . '/upload/product/');



// Process URL from browser
require_once "./mvc/core/App.php";

// How controllers call Views & Models
require_once "./mvc/core/Controller.php";

// Connect Database
require_once "./mvc/core/DB.php";

// helper
require_once './mvc/helper/getName.php';
require_once './mvc/helper/showArray.php';
require_once './mvc/helper/numberFormat.php';
require_once './mvc/helper/redirectTo.php';
require_once './mvc/helper/getStatusBill.php';
require_once './mvc/helper/getPaging.php';
?>
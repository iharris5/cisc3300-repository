<?php
require_once "../App/Models/Model.php";
require_once "../App/Models/Product.php";
require_once "../App/Controllers/ProductController.php";

//set our env variables
$env = parse_ini_file('../.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use App\Controllers\ProductController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] ==='products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = isset($uriArray[3]) ? $uriArray[3] : null;
    $productController = new ProductController();
    $productController->searchByName($name);
} else {
	include 'Assets/Views/Product/products-view.html';
}


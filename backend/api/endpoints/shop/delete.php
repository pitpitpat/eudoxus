<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/shop.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$shop = new Shop($connection);
$shop->id = $_POST['id'];
$shop->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
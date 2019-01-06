<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/booksShops.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$bookShop = new BooksShops($connection);
$bookShop->id = $_POST['id'];
$bookShop->book_id = $_POST['book_id'];
$bookShop->shop_id = $_POST['shop_id'];
$bookShop->availability = $_POST['availability'];
$bookShop->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
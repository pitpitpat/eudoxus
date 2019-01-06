<?php
// reading by secretary declaration
include_once '../../library/config/dbhandler.php';
include_once '../../model/booksShops.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$bookShop = new BooksShops($connection);
$bookShop->book_id = $_GET['book_id'];
$responseBooksShops = $bookShop->getByBookId();
$response = array();
for ($i=0; $i<count($responseBooksShops["booksShops"]); $i++) {
    $shop = new Shop($connection);
    $shop->id = $responseBooksShops["booksShops"][$i]->shop_id;
    $responseShop = $shop->getById();
    $responseWithAvailability = [
        "shop" => $responseShop,
        "availability" => $responseBooksShops["booksShops"][$i]->availability
    ];
    array_push($response, $responseWithAvailability);
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
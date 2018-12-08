<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/book.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$book = new Book($connection);
$book->id = $_POST['id'];
$book->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentBook.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentBook = new StudentBook($connection);
$studentBook->id = $_POST['id'];
$studentBook->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
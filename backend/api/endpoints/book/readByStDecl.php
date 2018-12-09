<?php
// reading by student declaration
include_once '../../library/config/dbhandler.php';
include_once '../../model/book.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$book = new Book($connection);
$declarationId = $_GET['declarationId'];
$response = $book->getByStudentDeclarationId($declarationId);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
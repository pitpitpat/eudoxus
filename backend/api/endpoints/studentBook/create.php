<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentBook.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentBook = new StudentBook($connection);
$studentBook->book_id = $_POST['book_id'];
$studentBook->student_id = $_POST['student_id'];
$studentBook->availability = $_POST['availability'];
$response = $studentBook->create();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
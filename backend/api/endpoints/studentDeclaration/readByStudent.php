<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentDeclaration.php';
include_once '../../model/book.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentDeclaration = new StudentDeclaration($connection);
$studentDeclaration->student_id = $_GET['student_id'];
$responseDeclaration = $studentDeclaration->getByStudentId();
$response = array();
for ($i=0; $i<count($responseDeclaration["declaration"]); $i++) {
    $book = new Book($connection);
    $responseBooks = $book->getByStudentDeclarationId($responseDeclaration["declaration"][$i]->id);
    $responseWithBooks = [
        "declaration" => $responseDeclaration["declaration"][$i],
        "books" => $responseBooks["books"]
    ];
    array_push($response, $responseWithBooks);
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
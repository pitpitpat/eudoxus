<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclaration.php';
include_once '../../model/book.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclaration = new SecretaryDeclaration($connection);
$secretaryDeclaration->secretary_id = $_GET['secretary_id'];
$responseDeclaration = $secretaryDeclaration->getBySecretaryId();
$response = array();
for ($i=0; $i<count($responseDeclaration["declaration"]); $i++) {
    $book = new Book($connection);
    $responseBooks = $book->getBySecretaryDeclarationId($responseDeclaration["declaration"][$i]->id);
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
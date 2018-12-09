<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclarationsBooks.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclarationsBooks = new SecretaryDeclarationsBooks($connection);
$secretaryDeclarationsBooks->id = $_GET['id'];
$response = $secretaryDeclarationsBooks->getById();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclaration.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclaration = new SecretaryDeclaration($connection);
$secretaryDeclaration->id = $_GET['id'];
$response = $secretaryDeclaration->getById();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
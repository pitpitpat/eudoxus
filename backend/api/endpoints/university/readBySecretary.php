<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/university.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$university = new University($connection);
$secretaryId = $_GET['secretaryId'];
$response = $university->getBySecretaryId($secretaryId);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
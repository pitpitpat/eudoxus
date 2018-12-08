<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclaration.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclaration = new SecretaryDeclaration($connection);
$secretaryDeclaration->id = $_POST['id'];
$secretaryDeclaration->timestamp = $_POST['name'];
$secretaryDeclaration->secretary_id = $_POST['secretary_id'];
$secretaryDeclaration->code = $_POST['code'];
$secretaryDeclaration->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
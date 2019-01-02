<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentDeclaration.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentDeclaration = new StudentDeclaration($connection);
$studentDeclaration->id = $_GET['id'];
$studentDeclaration->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
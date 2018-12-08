<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentDeclaration.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentDeclaration = new StudentDeclaration($connection);
$studentDeclaration->timestamp = $_POST['name'];
$studentDeclaration->student_id = $_POST['student_id'];
$studentDeclaration->code = $_POST['code'];
$response = $studentDeclaration->create();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
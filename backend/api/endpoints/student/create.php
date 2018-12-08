<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$student = new Student($connection);
$student->name = $_POST['name'];
$student->surname = $_POST['surname'];
$student->department_id = $_POST['department_id'];
$student->code = $_POST['code'];
$student->password = $_POST['password'];
$response = $student->create();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
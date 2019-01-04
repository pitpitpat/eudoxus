<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$student = new Student($connection);
$student->id = $_POST['id'];
$student->name = $_POST['name'];
$student->surname = $_POST['surname'];
$student->department_id = $_POST['department_id'];
$student->code = $_POST['code'];
$student->password = $_POST['password'];
$student->email = $_POST['email'];
$student->phone = $_POST['phone'];
$student->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
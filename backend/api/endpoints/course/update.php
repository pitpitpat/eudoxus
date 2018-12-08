<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/course.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$course = new Course($connection);
$course->id = $_POST['id'];
$course->name = $_POST['name'];
$course->professor = $_POST['professor'];
$course->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
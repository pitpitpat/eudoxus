<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/departmentsCourses.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$departmentsCourses = new DepartmentsCourses($connection);
$departmentsCourses->id = $_POST['id'];
$departmentsCourses->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
<?php
// include database handler and model files
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';

// instantiate database and student object
$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

// initialize object
$student = new Student($connection);
$response = $student->getAll();

// set required headers and response code
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

// show students data in json format
echo json_encode($response);
?>
<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';
use \Firebase\JWT\JWT;
//TODO use php-jwt library to apply jwt auth
//https://www.codeofaninja.com/2018/09/rest-api-authentication-example-php-jwt-tutorial.html
//very nice tutorial above
//https://github.com/firebase/php-jwt
//library github page above
//REQUIRES COMPOSER TO BE INSTALLED
//https://getcomposer.org/download/

/*
// instantiate database and student object
$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

// initialize object
$student = new Student($connection);
$student->id = $_GET['id'];
$response = $student->getById();

// set required headers and response code
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);


// show students data in json format
echo json_encode($response);
*/
?>
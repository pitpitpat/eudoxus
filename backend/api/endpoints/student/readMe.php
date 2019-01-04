<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';
include_once '../../config/config.php';
require __DIR__ . '/../../../../vendor/autoload.php';
use \Firebase\JWT\JWT;

$postdata = file_get_contents("php://input");
$headers = apache_request_headers();
$token = $headers['Authorization'];

// instantiate database and student object
$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

//decode token and prepare for authorization
$decodedToken = JWT::decode($token, $key, array('HS256'));
$tokenId = intval($decodedToken->data->id);
$tokenType = $decodedToken->data->type;
if ($tokenType != "student") {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
} else {
    // initialize object
    $student = new Student($connection);
    $student->id = $tokenId;
    $response = $student->getById();
    
    if ($response == [false]) {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(404);
        echo json_encode($response);
    } else {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(200);
        echo json_encode($response);
    }
}
?>
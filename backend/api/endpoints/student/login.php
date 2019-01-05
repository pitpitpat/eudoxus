<?php
// include database handler and model files
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';
include_once '../../config/config.php';
require __DIR__ . '/../../../../vendor/autoload.php';
use \Firebase\JWT\JWT;

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$student = new Student($connection);
$student->code = $request->code;
$student->password = $request->password;

$response = $student->login();
if ($response == false) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
    echo json_encode($response);
} else {
    $token = array(
        "iss" => $iss,
        "iat" => $iat,
        "data" => [
                "id" => $response->id,
                "type" => "student"
            ]
     );
    // generate jwt
    $jwt = JWT::encode($token, $key);

    // set required headers and response code
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Authorization: " . $jwt);
    http_response_code(200);

    // show students data in json format
    echo json_encode($response);
}
?>
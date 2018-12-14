<?php
// include database handler and model files
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretary.php';
use \Firebase\JWT\JWT;
//TODO use php-jwt library to apply jwt auth
//https://www.codeofaninja.com/2018/09/rest-api-authentication-example-php-jwt-tutorial.html
//very nice tutorial above
//https://github.com/firebase/php-jwt
//library github page above
//REQUIRES COMPOSER TO BE INSTALLED
//https://getcomposer.org/download/

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretary = new Secretary($connection);
$secretary->username = $request->username;
$secretary->password = $request->password;

$response = $secretary->login();
if ($response == [false]) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
    echo json_encode($response);
} else {
    // set required headers and response code
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    // show students data in json format
    echo json_encode($response);
}
?>
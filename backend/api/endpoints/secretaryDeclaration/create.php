<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclaration.php';
include_once '../../model/secretaryDeclarationsBooks.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclaration = new SecretaryDeclaration($connection);
date_default_timezone_set("Europe/Athens");
$secretaryDeclaration->timestamp = date("Y-m-d H:i:s");
$secretaryDeclaration->secretary_id =  $request->secretary_id;
$secretaryDeclaration->code = rand(100000000, 999999999);
$response = $secretaryDeclaration->create();
for ($i=0; $i<count($request->books); $i++) {
    $secretaryDeclarationsBooks = new SecretaryDeclarationsBooks($connection);
    $secretaryDeclarationsBooks->book_id = $request->books[$i]->id;
    $secretaryDeclarationsBooks->declaration_id = intval($response);
    $secretaryDeclarationsBooks->create();
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
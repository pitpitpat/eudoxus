<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentDeclaration.php';
include_once '../../model/studentDeclarationsBooks.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentDeclaration = new StudentDeclaration($connection);
date_default_timezone_set("Europe/Athens");
$studentDeclaration->timestamp = date("Y-m-d H:i:s");
$studentDeclaration->student_id =  $request->student_id;
$studentDeclaration->code = rand(100000000, 999999999);
$studentDeclaration->semester = $request->semester;
$response = $studentDeclaration->create();
for ($i=0; $i<count($request->books); $i++) {
    $studentDeclarationsBooks = new StudentDeclarationsBooks($connection);
    $studentDeclarationsBooks->book_id = $request->books[$i]->id;
    $studentDeclarationsBooks->declaration_id = intval($response);
    $studentDeclarationsBooks->create();
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);

echo json_encode($response);
?>
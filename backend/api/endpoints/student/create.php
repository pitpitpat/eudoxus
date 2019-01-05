<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/student.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$student = new Student($connection);
$student->department_id = $request->department_id;
$student->name = $request->name;
$student->surname = $request->surname;
$student->code = $request->code;
$student->password = $request->password;
$student->email = $request['email'];
$student->phone = $request['phone'];
$student->semester = $request->semester;
if ($student->code == '' || $student->code == NULL
    || $student->password == '' || $student->password == NULL
    || $student->existsByCode($student->code) != NULL) {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(400);
    }
else {
    $response = $student->create();

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);
    echo json_encode($response);
}
?>
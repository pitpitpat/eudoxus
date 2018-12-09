<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/studentDeclarationsBooks.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$studentDeclarationsBooks = new StudentDeclarationsBooks($connection);
$studentDeclarationsBooks->id = $_POST['id'];
$studentDeclarationsBooks->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
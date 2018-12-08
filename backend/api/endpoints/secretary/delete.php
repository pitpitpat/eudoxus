<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretary.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretary = new Secretary($connection);
$secretary->id = $_POST['id'];
$secretary->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
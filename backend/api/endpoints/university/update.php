<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/university.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$university = new University($connection);
$university->id = $_POST['id'];
$university->name = $_POST['name'];
$university->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
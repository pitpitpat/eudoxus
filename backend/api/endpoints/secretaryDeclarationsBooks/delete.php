<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclarationsBooks.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclarationsBooks = new SecretaryDeclarationsBooks($connection);
$secretaryDeclarationsBooks->id = $_POST['id'];
$secretaryDeclarationsBooks->delete();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
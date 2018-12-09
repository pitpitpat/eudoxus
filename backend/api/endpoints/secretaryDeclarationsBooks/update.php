<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/secretaryDeclarationsBooks.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$secretaryDeclarationsBooks = new SecretaryDeclarationsBooks($connection);
$secretaryDeclarationsBooks->id = $_POST['id'];
$secretaryDeclarationsBooks->book_id = $_POST['book_id'];
$secretaryDeclarationsBooks->declaration_id = $_POST['declaration_id'];
$secretaryDeclarationsBooks->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
<?php
include_once '../../library/config/dbhandler.php';
include_once '../../model/book.php';

$dbhandler = new DBHandler();
$connection = $dbhandler->getConnection();

$book = new Book($connection);
$book->id = $_POST['id'];
$book->name = $_POST['name'];
$book->course_id = $_POST['course_id'];
$book->code = $_POST['code'];
$book->author = $_POST['author'];
$book->pages = $_POST['pages'];
$book->update();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
http_response_code(200);
?>
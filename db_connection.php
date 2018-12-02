<?php
function openConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_name";
    $conn = new mysqli($host, $user, $pass, $db)
            or die("Database connection failed: %s\n" . $conn->error);
    return $conn;
}

function closeConnection($conn) {
    $conn -> close();
}
?>
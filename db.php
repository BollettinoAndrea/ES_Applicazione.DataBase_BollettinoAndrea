<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bollettino";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
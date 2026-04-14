<?php
include "db.php";

$data = $_GET['data'];

$sql = "SELECT * FROM persone WHERE data_nascita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $data);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo $row['nome'] . " " . $row['cognome'] . "<br>";
}
?>
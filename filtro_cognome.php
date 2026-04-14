<?php
include "db.php";

$cognome = $_GET['cognome'];

$sql = "SELECT * FROM persone WHERE cognome LIKE ?";
$stmt = $conn->prepare($sql);
$search = "%" . $cognome . "%";
$stmt->bind_param("s", $search);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo $row['nome'] . " " . $row['cognome'] . "<br>";
}
?>
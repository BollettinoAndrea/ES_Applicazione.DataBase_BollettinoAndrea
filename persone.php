<?php
include "db.php";

$sql = "SELECT * FROM persone";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['id'] . " - " .
         $row['nome'] . " " .
         $row['cognome'] . " - " .
         $row['data_nascita'] . "<br>";
}
?>
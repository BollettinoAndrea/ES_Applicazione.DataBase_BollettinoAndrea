<?php
include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM persone WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Eliminata";
} else {
    echo "Errore";
}
?>
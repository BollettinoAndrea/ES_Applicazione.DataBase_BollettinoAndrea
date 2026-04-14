<?php
include "db.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data = $_POST['data_nascita'];

$sql = "UPDATE persone SET nome=?, cognome=?, data_nascita=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nome, $cognome, $data, $id);

if ($stmt->execute()) {
    echo "Modifica completata";
} else {
    echo "Errore";
}
?>
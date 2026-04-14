<?php
include "db.php";

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data = $_POST['data_nascita'];

$sql = "INSERT INTO persone (nome, cognome, data_nascita) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $cognome, $data);

if ($stmt->execute()) {
    echo "Persona aggiunta";
} else {
    echo "Errore";
}
?>
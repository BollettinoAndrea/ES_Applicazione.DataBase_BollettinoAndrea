<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$people = json_decode(file_get_contents('persone.json'), true);
foreach ($people as &$p) {
    if ($p['cf'] === $_POST['cf']) {
        $p['nome'] = $_POST['nome'];
        $p['cognome'] = $_POST['cognome'];
        $p['data_nascita'] = $_POST['data_nascita'];
        break;
    }
}

file_put_contents('persone.json', json_encode($people, JSON_PRETTY_PRINT));
header('Location: persone.php');
?>

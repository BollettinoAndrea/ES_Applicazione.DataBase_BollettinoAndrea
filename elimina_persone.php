<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$cf = $_GET['cf'];
$people = json_decode(file_get_contents('persone.json'), true);
$people = array_filter($people, fn($p) => $p['cf'] !== $cf);
file_put_contents('persone.json', json_encode(array_values($people), JSON_PRETTY_PRINT));
header('Location: persone.php');
?>

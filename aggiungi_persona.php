<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$people = file_exists('persone.json') ? json_decode(file_get_contents('persone.json'), true) : [];

$new_person = [
    'cf' => $_POST['cf'],
    'nome' => $_POST['nome'],
    'cognome' => $_POST['cognome'],
    'data_nascita' => $_POST['data_nascita']
];

$people[] = $new_person;
file_put_contents('persone.json', json_encode($people, JSON_PRETTY_PRINT));
header('Location: persone.php');
?>

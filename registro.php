<?php
$users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];

$new_user = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
];

foreach ($users as $user) {
    if ($user['username'] === $new_user['username']) {
        die('Username già esistente. <a href="registro.html">Torna indietro</a>');
    }
}

$users[] = $new_user;
file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
header('Location: index.html');
?>

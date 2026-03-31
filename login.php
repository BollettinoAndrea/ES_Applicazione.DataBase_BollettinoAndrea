<?php
session_start();
$users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];

foreach ($users as $user) {
    if ($user['username'] === $_POST['username'] && $user['password'] === $_POST['password']) {
        $_SESSION['username'] = $user['username'];
        header('Location: dashboard.php');
        exit;
    }
}
echo "Login fallito. <a href='index.html'>Riprova</a>";
?>

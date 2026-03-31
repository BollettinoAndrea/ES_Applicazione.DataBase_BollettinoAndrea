<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Benvenuto <?= $_SESSION['username'] ?></h2>
  <ul>
    <li><a href="aggiungi_persona.html">Aggiungi persona</a></li>
    <li><a href="persone.php">Visualizza persone</a></li>
    <li><a href="filtro_cognome.php">Filtra per cognome</a></li>
    <li><a href="filtro_data.php">Filtra per data di nascita</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</body>
</html>

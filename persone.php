<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$people = file_exists('persone.json') ? json_decode(file_get_contents('persone.json'), true) : [];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Persone</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Lista Persone</h2>
  <ul>
    <?php foreach ($people as $p): ?>
      <li><?= $p['cf'] ?> - <?= $p['nome'] ?> <?= $p['cognome'] ?> (<?= $p['data_nascita'] ?>)
        <a href="modifica_persone.php?cf=<?= $p['cf'] ?>">Modifica</a> |
        <a href="elimina_persone.php?cf=<?= $p['cf'] ?>">Elimina</a>
      </li>
    <?php endforeach; ?>
  </ul>
  <a href="dashboard.php">Torna alla Dashboard</a>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$results = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cognome = $_POST['cognome'];
    $people = json_decode(file_get_contents('persone.json'), true);
    $results = array_filter($people, fn($p) => strtolower($p['cognome']) === strtolower($cognome));
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Filtro Cognome</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Filtra per Cognome</h2>
  <form method="POST">
    <input type="text" name="cognome" required>
    <button type="submit">Cerca</button>
  </form>
  <ul>
    <?php foreach ($results as $p): ?>
      <li><?= $p['cf'] ?> - <?= $p['nome'] ?> <?= $p['cognome'] ?> (<?= $p['data_nascita'] ?>)</li>
    <?php endforeach; ?>
  </ul>
</body>
</html>


<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$results = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data_nascita'];
    $people = json_decode(file_get_contents('persone.json'), true);
    $results = array_filter($people, fn($p) => $p['data_nascita'] > $data);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Filtro per Data di Nascita</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Filtra per Data di Nascita</h2>
  <form method="POST">
    <input type="date" name="data_nascita" required>
    <button type="submit">Cerca</button>
  </form>
  <ul>
    <?php foreach ($results as $p): ?>
      <li><?= $p['cf'] ?> - <?= $p['nome'] ?> <?= $p['cognome'] ?> (<?= $p['data_nascita'] ?>)</li>
    <?php endforeach; ?>
  </ul>
</body>
</html>

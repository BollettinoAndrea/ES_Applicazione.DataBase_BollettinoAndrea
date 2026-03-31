<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

$cf = $_GET['cf'];
$people = json_decode(file_get_contents('persone.json'), true);
$person = null;

foreach ($people as $p) {
    if ($p['cf'] === $cf) {
        $person = $p;
        break;
    }
}

if (!$person) {
    die("Persona non trovata");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Modifica Persona</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Modifica Persona</h2>
  <form method="POST" action="update_persone.php">
    <input type="hidden" name="cf" value="<?= $person['cf'] ?>">
    <input type="text" name="nome" value="<?= $person['nome'] ?>" required><br>
    <input type="text" name="cognome" value="<?= $person['cognome'] ?>" required><br>
    <input type="date" name="data_nascita" value="<?= $person['data_nascita'] ?>" required><br>
    <button type="submit">Aggiorna</button>
  </form>
</body>
</html>

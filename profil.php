
<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = htmlspecialchars(
    $_SESSION["login"],
    ENT_QUOTES,
    "UTF-8"
);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
</head>
<body>

<h2>Exercice 6.1</h2>
<h3>Profil</h3>

<p>Bienvenue, <?= $login ?> !</p>

<a href="deconnexion.php">Se déconnecter</a>

</body>
</html>

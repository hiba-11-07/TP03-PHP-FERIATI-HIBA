
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");

    if ($login !== "") {
        $_SESSION["login"] = $login;

        // Cookie valable 24 heures
        setcookie(
            "dernier_login",
            $login,
            time() + 86400,
            "/"
        );

        // Redirection vers le profil
        header("Location: profil.php");
        exit;
    }

    $erreur = "Veuillez saisir votre login.";
}

$dernier_login = $_COOKIE["dernier_login"] ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Exercice 6.1</h2>
<h3>Connexion</h3>

<?php if (isset($erreur)): ?>
    <p><?= htmlspecialchars($erreur, ENT_QUOTES, "UTF-8") ?></p>
<?php endif; ?>

<form action="login.php" method="POST">
    <label for="login">Login :</label>
    <input
        type="text"
        id="login"
        name="login"
        value="<?= htmlspecialchars($dernier_login, ENT_QUOTES, "UTF-8") ?>"
        required
    >

    <button type="submit">Se connecter</button>
</form>

</body>
</html>

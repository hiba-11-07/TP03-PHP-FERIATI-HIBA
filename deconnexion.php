<h2>Exercice 6.1</h2>

<?php
session_start();

// Vider les variables de session
session_unset();

// Détruire la session
session_destroy();

// Retour à la page de connexion
header("Location: login.php");
exit;
?>

<h2>Exercice 4.2</h2>

<?php

if (
    !isset($_GET["nom"], $_GET["prenom"], $_GET["sexe"]) ||
    trim($_GET["nom"]) === "" ||
    trim($_GET["prenom"]) === "" ||
    !in_array($_GET["sexe"], ["M", "F"], true)
) {
    exit("Erreur : veuillez remplir correctement le formulaire.");
}

$nom = htmlspecialchars(trim($_GET["nom"]), ENT_QUOTES, "UTF-8");
$prenom = htmlspecialchars(trim($_GET["prenom"]), ENT_QUOTES, "UTF-8");
$sexe = $_GET["sexe"];

if ($sexe === "M") {
    $salutation = "Monsieur";
} else {
    $salutation = "Madame";
}

echo "Bonjour " . $salutation . " " . $prenom . " " . $nom;

?>

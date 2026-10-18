
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des notes</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Exercice 5.2</h2>
<h3>Liste des apprenants</h3>

<?php

require "config.php";

$fichier = __DIR__ . "/data/notes.csv";

// 1. Vérifier l'existence du fichier
if (!file_exists($fichier)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

// 2. Ouvrir le fichier en lecture
$fp = fopen($fichier, "r");

if ($fp === false) {
    exit("Erreur : impossible d'ouvrir notes.csv en lecture.");
}

$somme_moyennes = 0;
$nombre_apprenants = 0;

echo "<table>";
echo "<tr>
        <th>Nom</th>
        <th>Info</th>
        <th>Math</th>
        <th>Moyenne</th>
        <th>Mention</th>
      </tr>";

// 3. Lire chaque enregistrement CSV
while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

    // Ignorer les lignes incomplètes ou incorrectes
    if (count($ligne) !== 4 ||
        !is_numeric($ligne[1]) ||
        !is_numeric($ligne[2]) ||
        !is_numeric($ligne[3])) {
        continue;
    }

    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];
    $moyenne = (float) $ligne[3];

    // Calculer la mention à partir de la moyenne
    if ($moyenne >= 16) {
        $mention = "Très bien";
    } elseif ($moyenne >= 14) {
        $mention = "Bien";
    } elseif ($moyenne >= 12) {
        $mention = "Assez bien";
    } elseif ($moyenne >= SEUIL) {
        $mention = "Passable";
    } else {
        $mention = "Ajourné";
    }

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom, ENT_QUOTES, "UTF-8") . "</td>";
    echo "<td>" . $info . "</td>";
    echo "<td>" . $math . "</td>";
    echo "<td>" . $moyenne . "</td>";
    echo "<td>" . $mention . "</td>";
    echo "</tr>";

    $somme_moyennes += $moyenne;
    $nombre_apprenants++;
}

echo "</table>";

fclose($fp);

// 5. Moyenne générale de la classe
if ($nombre_apprenants > 0) {
    $moyenne_generale = $somme_moyennes / $nombre_apprenants;

    echo "<p>Moyenne générale de la classe : "
        . round($moyenne_generale, 2) . "</p>";
} else {
    echo "<p>Aucun enregistrement valide.</p>";
}

?>

</body>
</html>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Export JSON</title>
</head>
<body>

<h2>Exercice 5.4</h2>
<h3>Export et sérialisation</h3>

<?php

$fichier_csv = __DIR__ . "/data/notes.csv";
$fichier_json = __DIR__ . "/data/notes.json";

if (!file_exists($fichier_csv)) {
    exit("Erreur : le fichier CSV n'existe pas.");
}

$fp = fopen($fichier_csv, "r");

if ($fp === false) {
    exit("Erreur : impossible d'ouvrir le CSV.");
}

$resultats = [];

while (($ligne = fgetcsv($fp, 0, ";")) !== false) {

    if (
        count($ligne) !== 4 ||
        !is_numeric($ligne[1]) ||
        !is_numeric($ligne[2]) ||
        !is_numeric($ligne[3])
    ) {
        continue;
    }

    $nom = $ligne[0];
    $note_info = (float) $ligne[1];
    $note_math = (float) $ligne[2];
    $moyenne = (float) $ligne[3];

    // Tableau associatif des résultats
    $resultats[] = [
        "nom" => $nom,
        "note_info" => $note_info,
        "note_math" => $note_math,
        "moyenne" => $moyenne
    ];
}

fclose($fp);

// Encoder le tableau en JSON
$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    exit("Erreur : impossible de convertir les données en JSON.");
}

// Écrire dans notes.json
if (file_put_contents($fichier_json, $json) === false) {
    exit("Erreur : impossible d'écrire dans notes.json.");
}

echo "<h4>Contenu JSON enregistré</h4>";
echo "<pre>" . htmlspecialchars($json, ENT_QUOTES, "UTF-8") . "</pre>";

// Relire le fichier JSON
$json_lu = file_get_contents($fichier_json);

if ($json_lu === false) {
    exit("Erreur : impossible de relire notes.json.");
}

// Convertir le JSON en tableau PHP
$donnees = json_decode($json_lu, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    exit("Erreur : le fichier JSON est invalide.");
}

echo "<h4>Données relues avec json_decode()</h4>";
echo "<pre>";
echo htmlspecialchars(print_r($donnees, true), ENT_QUOTES, "UTF-8");
echo "</pre>";

// Comparer serialize() et json_encode()
echo "<h4>Comparaison de serialize() et json_encode()</h4>";

$serialise = serialize($resultats);

echo "<h5>Résultat de serialize()</h5>";
echo "<pre>" . htmlspecialchars($serialise, ENT_QUOTES, "UTF-8") . "</pre>";

echo "<h5>Résultat de json_encode()</h5>";
echo "<pre>" . htmlspecialchars($json, ENT_QUOTES, "UTF-8") . "</pre>";

?>

</body>
</html>

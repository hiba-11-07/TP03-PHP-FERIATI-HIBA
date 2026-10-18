<h2>Exercice 5.3</h2>

<?php

$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    exit("Erreur : le fichier notes.csv n'existe pas.");
}

$fp = fopen($fichier, "r");

if ($fp === false) {
    exit("Erreur : impossible d'ouvrir le fichier.");
}

echo "<h3>Lecture avec fgets() et explode()</h3>";

while (!feof($fp)) {
    $ligne = fgets($fp);

    if ($ligne === false) {
        break;
    }

    $ligne = rtrim($ligne, "\r\n");

    // Découper la ligne au niveau des points-virgules
    $champs = explode(";", $ligne);

    echo "<pre>";
    print_r($champs);
    echo "</pre>";
}

fclose($fp);

?>
